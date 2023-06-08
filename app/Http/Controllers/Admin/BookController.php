<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Book::query()->select(sprintf('%s.*', (new Book)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'book_show';
                $editGate      = 'book_edit';
                $deleteGate    = 'book_delete';
                $crudRoutePart = 'books';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'file', 'active']);

            return $table->make(true);
        }

        return view('admin.books.index');
    }

    public function create()
    {
        abort_if(Gate::denies('book_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.books.create');
    }

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());

        if ($request->input('photo', false)) {
            $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('file', false)) {
            $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $book->id]);
        }

        return redirect()->route('admin.books.index');
    }

    public function edit(Book $book)
    {
        abort_if(Gate::denies('book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.books.edit', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->all());

        if ($request->input('photo', false)) {
            if (! $book->photo || $request->input('photo') !== $book->photo->file_name) {
                if ($book->photo) {
                    $book->photo->delete();
                }
                $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($book->photo) {
            $book->photo->delete();
        }

        if ($request->input('file', false)) {
            if (! $book->file || $request->input('file') !== $book->file->file_name) {
                if ($book->file) {
                    $book->file->delete();
                }
                $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($book->file) {
            $book->file->delete();
        }

        return redirect()->route('admin.books.index');
    }

    public function show(Book $book)
    {
        abort_if(Gate::denies('book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        abort_if(Gate::denies('book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $book->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookRequest $request)
    {
        $books = Book::find(request('ids'));

        foreach ($books as $book) {
            $book->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('book_create') && Gate::denies('book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Book();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

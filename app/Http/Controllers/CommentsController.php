<?php

namespace App\Http\Controllers;

use App\Events\ChattingMessages;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Comment;
use App\Models\RequestService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CommentsController extends Controller
{
    use MediaUploadingTrait;
    
    public function store(Request $request){  
        $comment = Comment::create([
            'comment' => $request->comment, 
            'user_id' => Auth::id(),
            'request_service_id' => $request->request_service_id,
        ]); 
        $has_files = 0;  
        foreach ($request->input('files', []) as $file) {
            $comment->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            $has_files = 1;
        } 
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $comment->id]); 
        }

        $data = [
            'request_service_id' => $request->request_service_id,
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'message' => $request->comment, 
            'files_urls' => $has_files ? $comment->files : null,
        ];
        event(new ChattingMessages($data));
        return $has_files;
    }
    
    public function storeCKEditorImages(Request $request){
        $model         = new Comment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

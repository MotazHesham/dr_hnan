@section('styles')
    <style>
        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 76%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 60px;
            z-index: 1;
        }

        .hide-dropzone {
            display: none;
        }
    </style>
    <style>
        .incoming_msg {
            width: fit-content;
            max-width: 80%;
            float: left;
            text-align: left;
            margin: 5px 10px;
            clear: both;
        }

        .outgoing_msg , .outgoing_msg_extra{
            width: fit-content;
            max-width: 80%;
            float: right;
            text-align: right;
            margin: 5px 10px;
            clear: both;
        }

        .incoming_msg div {
            background: #d3d3d36e;
            padding: 15px;
            border-radius: 20px;
        }

        .outgoing_msg div {
            background: #83c4d36e;
            padding: 15px;
            border-radius: 20px;
        }
        .outgoing_msg_extra div {
            background: #e648406e;
            padding: 15px;
            border-radius: 20px;
        }

        .message-box {
            background: #80808017;
            max-height: 550px;
            overflow: scroll;
            overflow-x: hidden;
        }

        .message-box::-webkit-scrollbar {
            width: 5px;
        }

        .message-box::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, .0);
            border-radius: 10px;
        }

        .message-box::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background: rgba(0, 0, 0, .3);
        }

        .message-box::-webkit-scrollbar-thumb:hover {
            background: black;
        }
    </style>
@endsection
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <table class="table table-bordered ">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.requestService.fields.id') }}
                            </th>
                            <td>
                                {{ $requestService->id }}
                            </td>
                        </tr>
                        @if ($user_type == 'client')
                            <tr>
                                <th>
                                    {{ trans('cruds.requestService.fields.consultant') }}
                                </th>
                                <td>
                                    {{ $requestService->consultant->name ?? '' }}
                                </td>
                            </tr>
                        @elseif($user_type == 'consultant')
                            <tr>
                                <th>
                                    {{ trans('cruds.requestService.fields.user') }}
                                </th>
                                <td>
                                    {{ $requestService->user->name ?? '' }}
                                </td>
                            </tr>
                        @elseif($user_type == 'staff')
                            <tr>
                                <th>
                                    {{ trans('cruds.requestService.fields.consultant') }}
                                </th>
                                <td>
                                    {{ $requestService->consultant->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.requestService.fields.user') }}
                                </th>
                                <td>
                                    {{ $requestService->user->name ?? '' }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th>
                                {{ trans('cruds.requestService.fields.service') }}
                            </th>
                            <td>
                                {{ $requestService->service->name ?? '' }}
                            </td>
                        </tr>
                        @if ($requestService->contract)
                            <tr>
                                <th>
                                    {{ trans('cruds.requestService.fields.work_duration') }}
                                </th>
                                <td style="display: flex;justify-content: space-evenly;flex-wrap: wrap;">
                                    <span class="badge badge-light" style="padding:10px">
                                        <span class="badge badge-dark">
                                            {{ trans('cruds.requestService.fields.start_date') }}
                                        </span>
                                        {{ $requestService->start_date }}
                                    </span>
                                    <span class="badge badge-light" style="padding:10px">
                                        <span class="badge badge-dark">
                                            {{ trans('cruds.requestService.fields.end_date') }}
                                        </span>
                                        {{ $requestService->end_date }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.requestService.fields.required_price') }}
                                </th>
                                <td style="display: flex;justify-content: space-evenly;flex-wrap: wrap;">
                                    <span class="badge badge-light" style="padding:10px">
                                        {{ trans('cruds.requestService.fields.cost_1') }}
                                        <br><br>
                                        {{ $requestService->cost_1 }}
                                    </span>
                                    <span class="badge badge-light" style="padding:10px">
                                        {{ trans('cruds.requestService.fields.cost_2') }}
                                        <br><br>
                                        {{ $requestService->cost_2 }}
                                    </span>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8 col-md-12">
                @if ($requestService->status == 'accept')
                    @php
                        $stage_contract_color = trans('global.stages.' . $requestService->stages . '.contract');
                        $stage_cost_1_pending_color = trans('global.stages.' . $requestService->stages . '.cost_1_pending');
                        $stage_working_color = trans('global.stages.' . $requestService->stages . '.working');
                        $stage_cost_2_pending_color = trans('global.stages.' . $requestService->stages . '.cost_2_pending');
                        $stage_delivered_color = trans('global.stages.' . $requestService->stages . '.delivered');
                        $stage_done_color = trans('global.stages.' . $requestService->stages . '.done');
                    @endphp
                    <div class="accordion" id="accordionExample" style="text-align: center">
                        <div class="connecting-line"></div>
                        <div
                            style="display:flex;justify-content: space-evenly; flex-wrap: wrap;position: relative;z-index:2">
                            <div id="headingOne">
                                <small style="font-weight:bold"><br>العقد</small>
                                <br>
                                <button class="btn btn-{{ $stage_contract_color }} rounded-pill  text-white"
                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <span>
                                        @if ($stage_contract_color == 'success')
                                            <i class="fas fa-check"></i>
                                        @else
                                            1
                                        @endif
                                    </span>
                                </button>
                            </div>
                            <div id="headingTwo">
                                <small style="font-weight:bold">قيد تحويل رسوم<br> الدفعة الأولي</small>
                                <br>
                                <button class="btn btn-{{ $stage_cost_1_pending_color }} rounded-pill collapsed"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    <span>
                                        @if ($stage_cost_1_pending_color == 'success')
                                            <i class="fas fa-check"></i>
                                        @else
                                            2
                                        @endif
                                    </span>
                                </button>
                            </div>
                            <div id="headingThree">
                                <small style="font-weight:bold"><br>قيد التنفيذ</small>
                                <br>
                                <button class="btn btn-{{ $stage_working_color }} rounded-pill collapsed"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <span>
                                        @if ($stage_working_color == 'success')
                                            <i class="fas fa-check"></i>
                                        @else
                                            3
                                        @endif
                                    </span>
                                </button>
                            </div>
                            <div id="headingFour">
                                <small style="font-weight:bold">قيد تحويل <br>الدفعة الثانية</small>
                                <br>
                                <button class="btn btn-{{ $stage_cost_2_pending_color }} rounded-pill collapsed"
                                    data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <span>
                                        @if ($stage_cost_2_pending_color == 'success')
                                            <i class="fas fa-check"></i>
                                        @else
                                            4
                                        @endif
                                    </span>
                                </button>
                            </div>
                            <div id="headingFive">
                                <small style="font-weight:bold"><br>تم تسليم العمل</small>
                                <br>
                                <button class="btn btn-{{ $stage_delivered_color }} rounded-pill collapsed"
                                    data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    <span>
                                        @if ($stage_delivered_color == 'success')
                                            <i class="fas fa-check"></i>
                                        @else
                                            5
                                        @endif
                                    </span>
                                </button>
                            </div>
                            <div id="headingSix">
                                <small style="font-weight:bold"><br>منتهي</small>
                                <br>
                                <button class="btn btn-{{ $stage_done_color }} rounded-pill collapsed"
                                    data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    <span>
                                        @if ($stage_done_color == 'success')
                                            <i class="fas fa-check"></i>
                                        @else
                                            6
                                        @endif
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body">
                                <div id="collapseOne" class="collapse @if ($stage_contract_color == 'info') show @endif"
                                    aria-labelledby="headingOne" data-parent="#accordionExample">
                                    @include('partials.request_service.contract')
                                </div>
                                <div id="collapseTwo" class="collapse @if ($stage_cost_1_pending_color == 'info') show @endif"
                                    aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    @include('partials.request_service.cost_1_pending')
                                </div>
                                <div id="collapseThree" class="collapse @if ($stage_working_color == 'info') show @endif"
                                    aria-labelledby="headingThree" data-parent="#accordionExample">
                                    @include('partials.request_service.working')
                                </div>
                                <div id="collapseFour" class="collapse @if ($stage_cost_2_pending_color == 'info') show @endif"
                                    aria-labelledby="headingFour" data-parent="#accordionExample">
                                    @include('partials.request_service.cost_2_pending')
                                </div>
                                <div id="collapseFive" class="collapse @if ($stage_delivered_color == 'info') show @endif"
                                    aria-labelledby="headingFive" data-parent="#accordionExample">
                                    Still in Progress...
                                </div>
                                <div id="collapseSix" class="collapse @if ($stage_done_color == 'success') show @endif"
                                    aria-labelledby="headingSix" data-parent="#accordionExample">
                                    Still in Progress...
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        var channel = pusher.subscribe('chatting');

        channel.bind('App\\Events\\ChattingMessages', function(obj) {
            if('{{ $user_type == "staff" }}'){
                if(obj['user_id'] == '{{$requestService->consultant_id}}'){
                    var messageHtml = '<div class="outgoing_msg_extra">';
                }else{ 
                    var messageHtml = '<div class="incoming_msg">';
                }
            }else{
                if (obj['user_id'] != '{{ auth()->user()->id }}') {
                    var messageHtml = '<div class="incoming_msg">';
                } else {
                    var messageHtml = '<div class="outgoing_msg">';
                }
            }
            messageHtml += '<div>';
            messageHtml += '<b>' + obj['user_name'] + '</b>';
            messageHtml += '<p>';
            messageHtml += obj['message'] ? obj['message'] : '';
            if(obj['files_urls']){
                messageHtml += '<div>';
                    obj['files_urls'].forEach(element => { 
                        if(element['mime_type'] == 'image/jpeg'){
                            messageHtml += '<a href="'+element['original_url']+'" target="_blank">'; 
                            messageHtml +=  '<img src="'+element['preview_url']+'" style="border-radius: 15px;margin:5px" alt="">';
                            messageHtml += '</a>';
                        }else{
                            messageHtml += '<div style="margin:5px">';
                            messageHtml += '<a href="'+element['original_url']+'" target="_blank">'; 
                            var string = element['file_name'];
                            var parts = string.split("_");
                            var trimmedString = parts.slice(1).join("_");
                            messageHtml += trimmedString;
                            messageHtml += '</a>';
                            messageHtml += '</div>';
                        }
                    });
                messageHtml += '</div>';
            } 
            messageHtml += '</p>';   
            messageHtml += '</div>';
            messageHtml += '</div>';
            $('.message-box .messages').prepend(messageHtml);
        });

        $("#store-comment").submit(function(e) {
            e.preventDefault();
            var commentInput = $('#comment');
            var commentValue = commentInput.val();
            var inputNameArray = "files[]"; 
            if($('input[name="' + inputNameArray + '"]').val()){
                // do nothing as this comment only contain files
            }else{
                if (commentValue === '') {
                    return;
                }
            }
            var formData = $(this).serializeArray();
            var formAction = $(this).attr('action');
            var formMethod = $(this).attr('method'); 
            $('#upload-files-spinner').css('display','block'); 
            $.ajax({
                type: formMethod,
                url: formAction, 
                data: formData, 
                success: function (results) {  
                    $('#upload-files-spinner').css('display','none');
                    // empty the dropzone
                    $(".dz-preview").remove(); 
                    $("#files-dropzone").removeClass('dz-started');  
                    $('input[name="' + inputNameArray + '"]').remove();
                    // --------------------
                }
            });
            var clearCommentInput = $('#comment').val('');
        });
    </script>
@endsection

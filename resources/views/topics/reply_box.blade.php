<div class="fixed-bottom bg-gray-700 p-2">
    <div class="container px-0">
        @include('shared.error')
    </div>
    <div class="container px-0">
        <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
            <div class="form-row mb-0">
                <div class="col-md-8">
                    <textarea id="reply-content" class="form-control" rows="1" placeholder="分享您的見解~" name="content"></textarea>
                </div>
                <div class="col-md-4">
                    <button id="cancel" type="button" class="btn btn-primary" hidden><i class="fas fa-times"></i><span class="ml-2">取消</span></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-share"></i><span class="ml-2">回覆</span></button>
                </div>
            </div>
        </form>
    </div>
</div>

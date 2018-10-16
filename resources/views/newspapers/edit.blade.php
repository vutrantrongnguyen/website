@extends('layouts.app')
@section('css')
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
@endsection
@section('content')
    @if (Route::has('login'))
        <div class="entity_comments">
            @auth
                <form action="/newspapers/{{$incorrectNewspaper->id}}/update" method="post">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <input class="form-control" name="tieude" required placeholder="Tiêu đề" value="{{ old('tieude',$incorrectNewspaper->title) }}">
                    </div>
                    <div class="form-group">
        <textarea class="form-control" name="noidung" id="editor" required placeholder="Nhập phần nội dung bài viết">
            {{ $incorrectNewspaper->content }}
    </textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                    <script> CKEDITOR.replace('editor', {
                            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
                            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
                            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                        } ); </script>
                    <button class="btn btn-dark" type="submit">Sửa</button>
                </form>
            @else
                <p>Bạn chưa đăng nhập</p>
            @endauth
        </div>
    @endif

@endsection
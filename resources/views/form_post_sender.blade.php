<form method="post" action="/form_post_reciever">
    <input type="text" name="data">DATA
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Отправить">
    <!-- <input type="hidden" name="_method" value="PUT"> -->
</form>
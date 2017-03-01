<div class="panel">
    <form class="form-inline">
    @foreach ($queries as $key => $val)
    <input name="{{ $key }}" class="form-control" placeholder="{{ $val }}" value="{{ isset($_GET[$key])? $_GET[$key]: '' }}">
    @endforeach
    @yield ('forms')
    <button type="submit" class="btn btn-primary btn-sm">搜索</button>
    @yield ('buttons')
    </form>
</div>


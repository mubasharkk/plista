@include('header')

{{ Form::open(array('url' => '/ads')) }}

<div class="col-md-6 col-md-offset-3">
    <h3>Create new Advertisement</h3>
    <div class="form-group">
        <label>Title</label>
        <input class="form-control" type="text" name="title" required="1" />
    </div>
    <div class="form-group">
        <label>Text</label>
        <textarea class="form-control" name="text" required="1"></textarea>
    </div>
    <div class="form-group">
        <label>Image URL</label>
        <input class="form-control" type="url" name="image_url" placeholder="e.g. http://example.com/profile.png"/>
    </div>
    <div class="form-group">
        <label>Sponsor</label>
        <select name="sponsored_by" required="1" class="form-control">
            @foreach ($sponsors as $sp)
            <option value="{{ $sp['id'] }}">{{ $sp['realname'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Campaign ID</label>
        <input class="form-control" required="1" name="campaign_id" type="number"/>
    </div>
    <div class="form-group">
        {{ Form::submit('Create', array('class' => 'btn btn-success  btn-block')) }}
    </div>
</div>
{{ Form::close() }}

@include('footer')
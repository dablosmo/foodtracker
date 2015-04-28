@extends('layout')

@section('title')
    Add Food
@stop

@section('content')
    <h1>Add a Food to the Database</h1>

    <?php if (Session::has('success')): ?>
        <p class="success"><?php echo Session::get('success'); ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{Request::old('name')}}">
        </div>
        <div class="form-group">
            <label for="grams">Grams</label>
            <input type="grams" id="grams" name="grams" class="form-control" value="{{Request::old('grams')}}">
        </div>
        <div class="form-group">
            <label for="calories">Calories</label>
            <input type="calories" id="calories" name="calories" class="form-control" value="{{Request::old('calories)}}">
        </div>
        <div class="form-group">
            <label for="fat">Fat (g)</label>
            <input type="fat" id="fat" name="fat" class="form-control" value="{{Request::old('fat')}}">
        </div>
        <div class="form-group">
            <label for="cholesterol">Cholesterol (mg)</label>
            <input type="cholesterol" id="cholesterol" name="cholesterol" class="form-control" value="{{Request::old('cholesterol')}}">
        </div>
        <div class="form-group">
            <label for="sodium">Sodium (mg)</label>
            <input type="sodium" id="sodium" name="sodium" class="form-control" value="{{Request::old('sodium')}}">
        </div>
        <div class="form-group">
            <label for="carbohydrate">Carbohydrate (g)</label>
            <input type="carbohydrate" id="carbohydrate" name="carbohydrate" class="form-control" value="{{Request::old('carbohydrate')}}">
        </div>
        <div class="form-group">
            <label for="fiber">Fiber (g)</label>
            <input type="fiber" id="fiber" name="fiber" class="form-control" value="{{Request::old('fiber')}}">
        </div>
        <div class="form-group">
            <label for="sugar">Sugar (g)</label>
            <input type="sugar" id="sugar" name="sugar" class="form-control" value="{{Request::old('sugar')}}">
        </div>
        <div class="form-group">
            <label for="protein">Protein (g)</label>
            <input type="protein" id="protein" name="protein" class="form-control" value="{{Request::old('protein')}}">
        </div>

        <input type="submit" value="add_food" class="btn btn-primary">
    </form>
@stop
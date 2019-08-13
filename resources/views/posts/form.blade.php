<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Nome' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($post->name) ? $post->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    <label for="mail" class="control-label">{{ 'E-Mail' }}</label>
    <input class="form-control" name="mail" type="text" id="mail" value="{{ isset($post->mail) ? $post->mail : ''}}" >
    {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ddd') ? 'has-error' : ''}}">
    <label for="ddd" class="control-label">{{ 'DDD' }}</label>
    <input class="form-control" name="ddd" type="text" id="ddd" value="{{ isset($post->ddd) ? $post->ddd : ''}}" >
    {!! $errors->first('ddd', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Telefone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($post->phone) ? $post->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Adicionar' }}">
</div>

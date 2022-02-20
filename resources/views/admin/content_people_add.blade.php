<div class="wrapper container-fluid">

	{!! Form::open(['url' => route('peopleAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
 	
	
	<div class="form-group">
		
		{!! Form::label('name','Название',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
		</div>
	
	</div>

	
	<div class="form-group">
	     {!! Form::label('postion', 'Postion:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
	     	{!! Form::text('postion',old('postion'),['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
		 </div>
    </div>

    	<div class="form-group">
	     {!! Form::label('text', 'Text:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
	     	{!! Form::text('text',old('text'),['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
		 </div>
    </div>
      
    <div class="form-group">
	     {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
		 </div>
    </div>
    
    
      <div class="form-group">
	    <div class="col-xs-offset-2 col-xs-10">
	      {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
	    </div>
	  </div>
	
	
	
	{!! Form::close() !!}
	
	<script>
		CKEDITOR.replace('editor');
	</script>
	
</div>

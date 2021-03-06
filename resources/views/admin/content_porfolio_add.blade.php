<div class="wrapper container-fluid">

	{!! Form::open(['url' => route('portfolioAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
 	
	
	<div class="form-group">
		
		{!! Form::label('name','Название',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
		</div>
	
	</div>

	
	<div class="form-group">
	     {!! Form::label('filter', 'filter:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
	     	{!! Form::text('filter',old('name'),['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
		 </div>
    </div>
      
    <div class="form-group">
	     {!! Form::label('img', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::file('img', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
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

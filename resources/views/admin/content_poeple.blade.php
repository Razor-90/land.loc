<div style="margin:0px 50px 0px 50px;">   

@if($people)
 
	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Image</th>
                <th>Position</th>               
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($people as $k => $peopl)
        
        	<tr>
        	
        		<td>{{ $peopl->id }}</td>
        		<td>{!! Html::link(route('peopleEdit',['peopl'=>$peopl->id]),$peopl->name,['alt'=>$peopl->name]) !!}</td>
                <td>{{ $peopl->text }}</td> 
        		<td>{!! Html::image('assets/img/'.$peopl['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}</td>
        		<td>{{ $peopl->position }}</td>      		
        		<td>
	        		{!! Form::open(['url'=>route('peopleEdit',['peopl'=>$peopl->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
	        			
	        		    {{ method_field('DELETE') }}
	        			{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
	        			
	        		{!! Form::close() !!}
        		</td>
        	</tr>
        
        @endforeach
        
		
        </tbody>
    </table>
@endif 

{!! Html::link(route('peopleAdd'),'Новая страница') !!}
   
</div>
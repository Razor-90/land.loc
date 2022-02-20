<div style="margin:0px 50px 0px 50px;">   

@if($portfolio)
 
	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Image</th>
                <th>filter</th>               
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($portfolio as $k => $portfol)
        
        	<tr>
        	
        		<td>{{ $portfol->id }}</td>
        		<td>{!! Html::link(route('portfolioEdit',['portfol'=>$portfol->id]),$portfol->name,['alt'=>$portfol->name]) !!}</td>
        		<td>{!! Html::image('assets/img/'.$portfol['img'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}</td>
        		<td>{{ $portfol->filter }}</td>      		
        		<td>
	        		{!! Form::open(['url'=>route('portfolioEdit',['portfol'=>$portfol->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
	        			
	        		    {{ method_field('DELETE') }}
	        			{!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
	        			
	        		{!! Form::close() !!}
        		</td>
        	</tr>
        
        @endforeach
        
		
        </tbody>
    </table>
@endif 

{!! Html::link(route('portfolioAdd'),'Новая страница') !!}
   
</div>
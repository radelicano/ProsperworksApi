

@if(count($logs)>0)
	
	@foreach($logs as $log)

	<tr>
	<!-- <td></td> -->
	<td>{{$log->emp_id}}</td>  
	<td>{{$log->employees->name}}</td>
	<td>{{$log->hours}}</td>
	<td><input type="checkbox" name="check[]"  value="{{$log->emp_id}}|{{$log->name}}|{{$log->email}}|{{$log->hours}}|{{$log->date_logged}}" /></td>
	</tr>

	@endforeach

@else
	<tr>
	<td colspan="4"><h1>no employee has logged on this day!</h1></td>
	</tr>
	
@endif
	
@extends('layouts.app')

@section('content')

<!-- Add New Task  -->
    <div class="card" >
        <div class="card-header">
            New Todo
        </div>

        <div class="card-body">
            <div class="form-group">
                <labe>Todo</label>
                <input type="text" class="form-control" id="taskName" placeholder="Enter task name">
            </div>
            <button class="btn btn-primary" id="taskAdd">Add</button>     
        </div>
    </div>
    <br>
    <br>

<!-- View TODO List -->

        
        <div class="card" >
        <div class="card-header">
             Todo List
        </div>

        <div class="card-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>To Do List</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    {{ $task->name }}
                                </td>

                                <td>
                                    <button  target="{{$task->id}}"  class='delete btn btn-xm btn-danger' > Delete </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   
    

@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
           $(document).on('click','#taskAdd',function(){
            $.ajax({
                url:'http://127.0.0.1:8000/api/tasks',
                type: 'post',
                data: {"name":$('#taskName').val()},
                success: function(res){
                      $('#taskName').val("");
                      var row = $("<tr>");
                      var deleteButton = $("<button>").html("Delete")
                      deleteButton.attr("class","delete btn btn-xm btn-danger");
                      deleteButton.attr("target",res.data.id);
                      row.append($("<td>").html(res.data.name));
                      row.append($("<td>").append(deleteButton));
                      $("tbody").append(row)
                }
                });
         
        });

        $(document).on('click','.delete',function(){
            let id = $(this).attr('target');
            let conf = confirm("Are you sure you want to delete this todo?");
            if(conf){
                $.ajax({
                    url:'http://127.0.0.1:8000/api/tasks/'+id,
                    type: 'POST',
                    data:{
                            '_token' : '{{csrf_token()}}',
                            '_method':'DELETE'
                        },
                    success: function(res){
                        if(res){
                           console.log("deleted successfully") 
                        }      
                     }
                     
                });
                $(this).parent().parent().remove();
            }
        });
   

</script>
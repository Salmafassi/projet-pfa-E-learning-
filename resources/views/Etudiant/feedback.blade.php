@extends('Etudiant.AccueilEtudiant')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
.modal{
  
    top:15%;
    left:15%;
}
    body {
        
  background: #f5f5f5;
  font-family: 'Varela Round', sans-serif;
  font-size: 16px;
 }
 .footer-section p {
    font-size: 16px;
}
.footer-section h3 {
    font-size: 16px;
}
 .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 100px 0;
  border-radius:1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
 .table-title {        
  padding-bottom: 15px;
     background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
  color: #fff;
  padding: 16px 30px;
  margin: -20px -25px 10px;
  border-radius: 1px 1px 0 0;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
    }
    .table-title h2 {
  margin: 5px 0 0;
  font-size: 24px;
 }
 .table-title .btn-group {
  float: right;
 }
 .table-title .btn {
  color: #fff;
  float: right;
  font-size: 13px;
  border: none;
  min-width: 50px;
  border-radius: 1px;
  border: none;
  outline: none !important;
  margin-left: 10px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
 }
 .table-title .btn i {
  float: left;
  font-size: 21px;
  margin-right: 5px;
 }
 .table-title .btn span {
  float: left;
  margin-top: 2px;
 }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
  padding: 12px 15px;
  vertical-align: middle;
    }
 table.table tr th:first-child {
  width: 60px;
 }
 table.table tr th:last-child {
  width: 100px;
 }
    table.table-striped tbody tr:nth-of-type(odd) {
     background-color: #fcfcfc;
 }
 table.table-striped.table-hover tbody tr:hover {
  background: #f5f5f5;
 }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    } 
    table.table td:last-child i {
  opacity: 0.9;
  font-size: 22px;
        margin: 0 5px;
    }
 table.table td a {
  font-weight: bold;
  color: #566787;
  display: inline-block;
  text-decoration: none;
  outline: none !important;
 }
 table.table td a:hover {
  color: #2196F3;
 }
 table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }

   
     
 /* Custom checkbox */
 /* .footer-section p {
    font-size: 16px;
}
.footer-section h3 {
    font-size: 16px;
}
  */
 /* Modal styles */
 .modal .modal-dialog {
  max-width: 400px;
 }
 .modal .modal-header, .modal .modal-body, .modal .modal-footer {
  padding: 20px 30px;
 }
 .modal .modal-content {
  border-radius: 1px;
 }
 /* .modal .modal-footer {
  background: #ecf0f1;
  border-radius: 0 0 1px 1px;
 } */
    .modal .modal-title {
        display: inline-block;
    }
 .modal .form-control {
  border-radius: 1px;
  box-shadow: none;
  border-color: #dddddd;
 }
 .modal textarea.form-control {
  resize: vertical;
 }

 .modal .btn {
  border-radius: 1px;
  min-width: 100px;
 } 
 .modal form label {
  font-weight: normal;
 } 
</style>
<script type="text/javascript">

$(document).ready(function()
{

$('#editEmployeeModal').on('show.bs.modal',function(event){
  
    var descript=$(event.relatedTarget).data('sfid');
 $(this).find("#description").html(descript);
 var type=$(event.relatedTarget).data('type');

 
   $("#typeselect option[value="+type+"]").prop('selected',true);
   var formation=$(event.relatedTarget).data('formation');
   $("#form option[value='"+formation+"']").prop('selected',true);
   var feedbackid=$(event.relatedTarget).data('id');
   $(this).find("#feedbackid").val(feedbackid);
 
});
$('#deleteEmployeeModal').on('show.bs.modal',function(event){
    var feedbackid=$(event.relatedTarget).data('id');
   $(this).find("#deleteid").text(feedbackid);
   $(this).find("#deleteinput").val(feedbackid);


});
 // Select/Deselect checkboxes

});
</script>

    <div class="container">
        <div class="table-wrapper">
            {{-- <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Manage <b>Employees</b></h2>
     </div>
     <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>      
     </div>
                </div>
            </div> --}}
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
      
                        <th>Numero </th>
                        <th>Description</th>
      <th>Type</th>
                        <th>Formation</th>
                        <th>Date_creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                    use App\Models\Formation;
                      @endphp --}}
      
       {{-- <span class="custom-checkbox">
        <input type="checkbox" id="checkbox1" name="options[]" value="1">
        <label for="checkbox1"></label>
       </span> --}}
       {{-- <img src="/uploads/user_image/1646505625.jpeg" height="60px" weight="30px" style="border-radius:50%"> --}}
       @php
       $i=1;
       @endphp
      @foreach($feedbacks as $feedback)

                <tr>

                    {{-- @php
                    use App\Models\Feedback;
                    $feedback=Feedback::where('formation')
                    @endphp --}}
                        <td>{{$feedback->id}}</td>
                        <td>{{$feedback->description}}</td>
      <td>{{$feedback->type}}</td>
                        <td>{{$feedback->formation->title}}</td>
                        <td>{{$feedback->dateCreation}}</td>
                        <td>
                            @php
                            $valeur=$feedback->description;
                            $valeur1=$feedback->formation->title;
                            @endphp
                            {{-- <input type="hidden" value="{{$feedback->description}}" id="descript">
                            <input type="hidden" value="{{$feedback->type}}" id="type">
                            <input type="hidden" value="{{$feedback->formation->title}}" id="formation"> --}}
                            <a href="#" data-target="#editEmployeeModal" class="edit" data-toggle="modal" data-id="{{$feedback->id}}" data-sfid="{{$valeur}}"  data-type="{{$feedback->type}}" data-formation="{{$valeur1}}" id="edit"><i class="fa-solid fa-pencil" style="color:#7971ea"></i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="{{$feedback->id}}" ><i class="fa-solid fa-trash-can" style="color:#7971ea"></i></a></td>
                    </tr>
                   
                        <div id="editEmployeeModal" class="modal fade" aria-hidden="true">
                            <div class="modal-dialog">
                             <div class="modal-content">
                              <form action="{{route('editfeedback')}}" method="post">
                                @csrf
                                {{ method_field('PUT')}}
                               <div class="modal-header">      
                                <h4 class="modal-title">Editer feedback</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               </div>
                               <div class="modal-body">     
                                <div class="form-group">
                                 <label>Descriprion</label>
                                 <input type="hidden"  name="feedbackid" id="feedbackid">
                                 <input type="hidden" value="{{Auth::user()->id}}" name="user" id="">
                                 <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                                <div class="form-group">
                                 <label>Type</label>
                                 <select  class="form-select" name="typeselect" id="typeselect">
                                     <option value="site" >Site</option>
                                     <option value="course" >Course</option>
                                 </select>
                                </div>  
                                   
                                <div class="form-group">
                                 <label>Formation :</label>
                                 @php
                                 $formation=App\Models\Formation::all();
                                 @endphp   
                                 <select name="form" class="form-select" id="form">
                                     @foreach($formation as $form)
                                     <option value="{{$form->title}}">{{$form->title}}</option>
                                     @endforeach
                                 </select>
                                </div>
                                   
                               </div>
                               <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                <input type="submit" class="btn btn-info" value="Save">
                               </div>
                              </form>
                             </div>
                            </div>
                           </div>
                           <div id="deleteEmployeeModal" class="modal fade"  aria-hidden="true">
                            <div class="modal-dialog">
                             <div class="modal-content">
                              <form method="post" action="/deletefeedback">
                                @csrf @method('DELETE')
                               <div class="modal-header">
                                   <input type="hidden" id="deleteinput" name="feedid">      
                                <h4 class="modal-title">Supprimer Feedback</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               </div>
                               <div class="modal-body">     
                                <p>Etes-vous sur de vouloir supprimer la feedback numero <span id="deleteid"></span>?</p>
                                <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
                               </div>
                               <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                                <input type="submit" class="btn btn-danger" value="supprimer">
                               </div>
                              </form>
                             </div>
                            </div>
                           </div>
                           @php
                           $i=$i+1;
                           @endphp
                        @endforeach
     
                </tbody>
            </table>
   <div class="clearfix">
            
            {{$feedbacks->onEachSide(1)->links()}}
        </div>
    </div>
 <!-- Edit Modal HTML -->
 
 <!-- Edit Modal HTML -->
 
 <!-- Delete Modal HTML -->

@endsection
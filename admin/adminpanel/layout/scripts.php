<!-- jQuery 3 -->
<script src="css/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="css/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="css/raphael/raphael.min.js"></script>
<script src="css/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="css/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="css/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="css/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="css/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="css/moment/min/moment.min.js"></script>
<script src="css/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="css/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="css/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="css/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="css/dist/js/adminlte.min.js"></script>


<script>
$('#EditUser').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('user_id_edit')
  var name = button.data('user_name_edit')
  var username = button.data('user_username_edit')
  var email = button.data('user_email_edit')
  var image_user = button.data('user_image_edit')
  var type = button.data('user_type_edit')
  var gender = button.data('user_gender_edit')
  var password = button.data('user_password_edit')

  if(type == 0) {
    document.getElementById("p1").innerHTML ='<label for="user_type" class="col-form-label"> User type:</label>'+
                      '<select class="form-control" id="user_type_edit_select" name="user_type_edit_select">'+
                    '<option value="" disabled>Select...</option>'+
                    '<option value="0" selected>User</option>'+
                    '<option value="1">Administrator</option>'+
                  '</select>';

  } else {
    document.getElementById("p1").innerHTML = '<label for="user_type" class="col-form-label"> User type:</label>'+
                      '<select class="form-control" id="user_type_edit_select" name="user_type_edit_select">'+
                    '<option value="" disabled>Select...</option>'+
                    '<option value="0" >User</option>'+
                    '<option value="1" selected>Administrator</option>'+
                  '</select>';
  }

  
  document.getElementById("user_name_write").innerHTML ='<h3 class="profile-username text-center">' + name +'</h3>';
    
  var modal = $(this)
  modal.find('.modal-body #user_id_edit').val(id);
  modal.find('.modal-body #user_name_edit').val(name);
  modal.find('.modal-body #user_username_edit').val(username);
  modal.find('.modal-body #user_email_edit').val(email);
  modal.find('.modal-body #user_type_edit').val(type);
  modal.find('.modal-body #user_gender_edit').val(gender);
  modal.find('.modal-body #user_password_edit').val(password);
  modal.find('.modal-body #confirm_password_edit').val(password);
  modal.find('.modal-body #user_image_edit').val(image_user);

  
 mouseOverUser(this);
if(gender == 1) {
    document.getElementById("p2").innerHTML ='<label for="cat_title" class="col-form-label"> Gender:</label><br>'+
                  '<label><input type="radio" name="user_gender_edit" id="user_gender_edit" value="1" checked> <i class="fa fa-female"aria-hidden="true"></i></label>'+
                  '<label><input type="radio" name="user_gender_edit" id="user_gender_edit" value="2"> <i class="fa fa-male" aria-hidden="true"></i></label>';

  } else {
    document.getElementById("p2").innerHTML = '<label for="cat_title" class="col-form-label"> Gender:</label><br>'+
                  '<label><input type="radio" name="user_gender_edit" id="user_gender_edit" value="1"> <i class="fa fa-female"aria-hidden="true"></i></label>'+
                  '<label><input type="radio" name="user_gender_edit" id="user_gender_edit" value="2" checked> <i class="fa fa-male" aria-hidden="true"></i></label>';
  }


})

$('#DeleteUser').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var user_id_delete = button.data('user_id_delete') // Extract info from data-* attributes

  var modal = $(this)
  modal.find('.modal-body #user_id_delete').val(user_id_delete);

}) 

$('#DeletePost').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var post_id_delete = button.data('post_id_delete') // Extract info from data-* attributes

  var modal = $(this)
  modal.find('.modal-body #post_id_delete').val(post_id_delete);

})

$('#EditPost').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id_edit')
  var title = button.data('title_edit')
  var image = button.data('image_edit')
  var text = button.data('description_edit')
  

      
  var modal = $(this)
  modal.find('.modal-body #id_edit').val(id);
  modal.find('.modal-body #title_edit').val(title);
  modal.find('.modal-body #post_image_edit1').val(image);
  modal.find('.modal-body #description_edit').val(text);
  var slikazaprikaz = document.getElementById("post_image_edit1").value; 





mouseOver(this); //LOAD IMAGE

   CKEDITOR.instances['post_text_edit'].setData(text)

})

 $('#DeleteComment').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var comment_id_delete = button.data('comment_id_delete') // Extract info from data-* attributes

  var modal = $(this)
  modal.find('.modal-body #comment_id_delete').val(comment_id_delete);

}) 
 


 
</script>






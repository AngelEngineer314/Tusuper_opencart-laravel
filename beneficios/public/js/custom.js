
//****************Global Varibals***************************** */
var CSRF_TOKEN ="";
var PROSPECTNUM = 0;
//*****************End of Global Variables******************** */

$(document).ready(function(){
  // initValidator();
  ImageUploadPrevView();

  initVarialble();
  initToastr();

});
// *********************************init handle*******************************************/
function ShowLoading()
{
  $('#loading').show();
}
function ImageUploadPrevView()
{
  if($('div[data-upload-id="myUniqueUploadId"]').length !== 0)
  {
    var upload = new FileUploadWithPreview('myUniqueUploadId', {
      showDeleteButtonOnImages: true,
  })
  }

}

function initValidator()
{
  if(document.forms.length != 0)
  {
    for(var i= 0; i < document.forms.length; i++)
    {
      var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[i]);
      // on form "submit" event
      document.forms[i].onsubmit = function (e) {
        var submit = true,
          validatorResult = validator.checkAll(this);
        // console.log("+"+validatorResult);
        return !!validatorResult.valid;
      };
      // on form "reset" event
      document.forms[i].onreset = function (e) {
        validator.reset();
      };
    }


 
 }

    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function () {
      validator.settings.alerts = !this.checked;
      if (this.checked)
        $('form .alert').remove();
    }).prop('checked', false);


}

function initVarialble()
{
   CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   PROSPECTNUM = $('.child-item').length+1;
}

function initToastr()
{
  toastr.options = {

    "closeButton": true,

    "debug": false,

    "newestOnTop": false,

    "progressBar": false,

    "positionClass": "toast-top-right",

    "preventDuplicates": false,

    "onclick": null,

    "showDuration": "300",

    "hideDuration": "1000",

    "timeOut": "5000",

    "extendedTimeOut": "1000",

    "showEasing": "swing",

    "hideEasing": "linear",

    "showMethod": "fadeIn",

    "hideMethod": "fadeOut"

}
}

function Logout()
{
    // console.log("sumbmit")
    $("#logout-form").submit();


}

function showSuccessMessage(message){
  toastr['success']('Succes: '+ message);
}

function showErrorMessage(message){
  toastr['error']('Error: '+ message);
}

function generateChildItem()
{
  
}

function AddChlidrenRow()
{
  var childMain = $('.child-item-hidden').html();
  $('.childrens-wrapper').append(' <div class="row child-item">'+childMain+'</div>');
}
//*************************************End of init Handle********************************** */

//***********************************Authentication******************************************/
$(document).on("click",".logout_btn", function(){
    Logout();
});
//****************************************************************************************** */


//***********************************Room Page ********************* */
//Edit-Room-Btn
$(document).on("click", ".edit-room-btn", function(){
  var id = $(this).attr('data-id');
  var url = $('#room-edit').val();

  $.ajax({
    method: "GET",
    url: url,
    data :{id: id},
    success:function(data)
    {
      var status = data["status"];


      if(status== "true") {
        $('#EditModal input[name="title"').val(data["data"]["title"]);
        $('#roomid').val(data["data"]["id"]);
        $('#show-edit-modal').trigger('click');
      } else {
        if(data["message"] != null)
        showErrorMessage(data["message"]);
      }

      $('#EditModal').modal('show');
    },
    error: function()
    {

    }
  })
});

//Delete-Room-btn
$(document).on("click", ".delete-btn", function(){
  var id = $(this).attr('data-id');
  var url = $('#room-delete').val();
  $this = $(this);
  $.ajax({
    method: "POST",
    url: url,
    data :{_token:CSRF_TOKEN,id: id},
    success:function(data)
    {
      var status = data["status"];


      if(status== "true")
      {
        $('#datatable-responsive').DataTable().row($this.parents('tr')).remove().draw();


        if(data["message"] != null)
          showSuccessMessage(data["message"])
      }
      else
      {
        if(data["message"] != null)
        showErrorMessage(data["message"]);

      }


      //$('#EditModal').modal('show');
    },
    error: function()
    {

    }
  })
});
//***********************************End of Page ********************* */

//*********************************Employee Page*********************** */
// ---- Create-Employee-Modal
// Generate Card Number
$(document).on('click', '#btn-card-generate', function() {
  var card_number = (Math.random()+' ').substring(2,10)+(Math.random()+' ').substring(2,10);
  // console.log(card_number);
  $.ajax({
    method: 'post',
    url: $('#url-card-number-check').val(),
    data :{ card_number: card_number, _token: CSRF_TOKEN },
    success:function(isCardNumber) {
      if (isCardNumber == 1) {
        $('#card-number').val(card_number);
      } else {
        console.log('This card number already exist');
        $('#card-number').val('');
      }
    },
    error: function() {

    }
  });
});

// Generate Security Number
$(document).on('click', '#btn-security-number-generate', function() {
  var security_number = (Math.random()+' ').substring(2, 4) + (Math.random()+' ').substring(2, 4);
  // console.log(card_number);
  $('#security-number').val(security_number);
});

//Edit-Employee-btn
$(document).on("click", ".edit-employee-btn", function(){
  var id = $(this).attr('data-id');
  var url = $('#url-employee-edit').val();

  $.ajax({
    method: "post",
    url: url,
    data :{id: id, _token: CSRF_TOKEN },
    success:function(data)
    {
      var status = data["status"];
      var result = data["data"];

      if(status== "true") {
        $('#EditModal input[name="username"]').val(result["username"]);
        $('#EditModal input#firstname').val(result["firstname"]);
        $('#EditModal input[name="lastname"]').val(result["lastname"]);
        $('#EditModal input[name="email"]').val(result["email"]);
        $('#EditModal input[name="card_number"]').val(result["card_number"]);
        $('#EditModal input[name="security_number"]').val(result["security_number"]);
        $('#EditModal input[name="amount"]').val(result["amount"]);
        $('#employee-id').val(result["customer_id"]);

        $('#EditModal').modal('show');
      }
      else {
        if(data["message"] != null)
        showErrorMessage(data["message"]);
      }
    },
    error: function() {

    }
  })
});

//Delete-Employee-btn
$(document).on("click", ".delete-employee-btn", function(){
  var id = $(this).attr('data-id');
  var url = $('#employee-delete').val();
  $this = $(this);
  $.ajax({
    method: "POST",
    url: url,
    data :{_token:CSRF_TOKEN, id: id},
    success:function(data) {
      var status = data["status"];

      if(status== "true") {
        $this.parents('tr').remove();
        $('#datatable-responsive').DataTable().row($this.parents('tr')).remove().draw();

        if(data["message"] != null)
          showSuccessMessage(data["message"])
      }
      else {
        if(data["message"] != null)
        showErrorMessage(data["message"]);
      }
    },
    error: function() {

    }
  })
});

//*********************************End of Employee Page**************** */
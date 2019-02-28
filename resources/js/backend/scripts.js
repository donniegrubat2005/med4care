 // Custom script
 var mainUrl = $('#mainUrl').attr('uval');

 var doc = $(document);

 $.ajaxSetup({
     headers: {
         'X-XSRF-TOKEN': decodeURIComponent(/XSRF-Token=([^;]*)/ig.exec(document.cookie)[1])
     }
 });


 $(function () {
     // Is Customer Active
     doc.on('change', '#isActive', function () {

         var urlArr = $(location).attr("href").split('/');
         var userId = urlArr[urlArr.length - 1];


         var isActive;

         if ($(this).is(':checked')) {
             $('#statusLabel span')
                 .removeClass('badge-danger ')
                 .removeClass('text-danger')
                 .addClass('text-primary')
                 .text('Activating...');
             isActive = 1;
         } else {
             $('#statusLabel span')
                 .removeClass('badge-success')
                 .removeClass('text-primary')
                 .addClass('text-danger')
                 .text('Deactivating...');
             isActive = 0;
         }
         $.ajax({
             type: "post",
             url: mainUrl + '/admin/auth/active',
             data: {
                 'status': isActive,
                 'userId': userId
             },
             success: function (resp) {
                 if (resp.key === true) {
                     $('#alert-div').append(`
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="fas fa-check"></i>
                            Account has been approved.
                        </div>
                    `);

                     $('#tr-appr').remove();

                     var points = resp.user.verification_points > 100 ? 100 : resp.user.verification_points;
                     var vLabel = points === 100 ? 'Done' : 'Completion';

                     $('#progress-content').show().html(
                         `<h6 class="card-title">` + points + `% ` + vLabel + ` </h6>
                         <div class="progress">
                            <div class="progress-bar" style="width:` + points + `%">` + points + `%</div>
                         </div>`
                     );
                 }
             }
         });

     })
 });


 $(function () {
     //  Edit blade script
     doc.on('click', '#add-documents', function () {
         var clone = $('#file-holder').clone();
         clone.removeClass('d-none');
         clone.find('input[type=file]').attr('name', 'files[]');
         $('.files-content').append(clone.removeAttr('id'));

     })
     doc.on('click', '.rmvDoc', function () {
         var fileHolder = $('.files-content').find('.form-group');
         if (fileHolder.length < 2) {
             alert('This field Cannot be remove.')
         } else {
             $(this).parent().parent().parent().remove();
         }
     })


     // create blade script
     doc.on('click', '#btnCDocument', function () {
         var clone = $('#file-holder').clone();
         clone.removeClass('d-none');
         clone.find('input[type=file]').attr('name', 'files[]');
         $('.files-content').append(clone.removeAttr('id'));

     });

     doc.on('click', '.btnCRmvDoc', function () {
         var fileHolder = $('.files-content').find('.form-group');
         if (fileHolder.length < 2) {
             alert('This field Cannot be remove.')
         } else {
             $(this).parent().parent().parent().remove();
         }
     });

     // Register blade script
     doc.on('change', '#userRole', function () {
         var userType = $(this).val();
         var content = $('#doc-content');

         switch (userType) {
             case 'team owner':
                 content.removeClass('d-none');
                 var clone = $('#file-holder').clone();
                 clone.removeClass('d-none');
                 clone.find('input[type=file]').attr('name', 'file[]').attr('required', true);
                 $('#file-content').append(clone.removeAttr('id'));
                 break;
             case 'user':
                 content.addClass('d-none');
                 $('#file-content').html(null);
                 break;
         }
     });

     // user registration
     doc.on('click', '#btnAddFile', function () {
         var clone = $('#file-holder').clone();
         clone.removeClass('d-none');
         clone.find('input[type=file]').attr('name', 'file[]').attr('required', true);
         $('#file-content').append(clone.removeAttr('id'));
     });

     doc.on('click', '.rmvFile', function () {
         var fileHolder = $('#file-content').find('.input-group');
         if (fileHolder.length < 2) {
             alert('This field Cannot be remove.')
         } else {
             $(this).parent().parent().remove();
         }
     });


 })


 // For account view & controller
 $(function () {
     doc.on('click', '.accntDeleteFile', function () {
         var $this = $(this);
         if (confirm('Are you sure you want to delete this file')) {
             var file = $this.parent().siblings('.card-body').find('img').attr('id');
             var docId = $this.attr('id');

             $.get(mainUrl + "/account/delete_document/" + docId + "/" + file,
                 function (data, textStatus, jqXHR) {
                     if (data === true) {
                         window.location.reload();
                     }
                 }
             );
         }
     });

 });


 $("#editImgInp").change(function () {
     get_image(this);
 });


 $("#createImg").change(function () {
     get_image(this);
 });

 function get_image(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
             $('.profile-image').show().html('<img src="#" name="image-file" id="chosse-image" class="user-image" />');
             $('#chosse-image').attr('src', e.target.result);
         };
         reader.readAsDataURL(input.files[0]);
     }
 }


 //  for deposit form
 $(function () {
     deposit_load_wallets();
     wwithdraw_load_wallets();
 });

 function deposit_load_wallets() {
     $.ajax({
         type: "get",
         url: mainUrl + '/wallet/deposit/getWallets',
         success: function (response) {
             console.log(response)
             $("#depositName").autocomplete({
                 source: response,
                 search: function (event, ui) {
                    //  console.log(ui)
                 },
                 select: function (event, ui) {
                     $("#depositName").val(ui.item.label);
                     $("#walletId").val(ui.item.value);
                    //  $('#description').val(ui.item.description)
                     return false;
                 },
             });
         }
     });
 }

 function wwithdraw_load_wallets() {
     $.ajax({
         type: "get",
         url: mainUrl + '/wallet/deposit/getWallets',
         success: function (response) {
             $("#wallet_name").autocomplete({
                 source: response,
                 search: function (event, ui) {
                    // console.log(ui)
                 },
                 select: function (event, ui) {
                     $("#wallet_name").val(ui.item.label);
                     $("#wallet_id").val(ui.item.value);
                     // $('#description').val(ui.item.description)
                     return false;
                 },
             });
         }
     });
 }
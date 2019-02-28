<!DOCTYPE html> @langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', app_name())">
    <meta name="author" content="@yield('meta_author', 'Bayang-Yang')"> @yield('meta') @stack('before-styles')
    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{-- {{ style(mix('css/frontend.css')) }} --}} {{ style(mix('css/backend.css')) }} @stack('after-styles')
    <style>
        #card-form {
            border-top: 3px solid #20a8d8;
        }

        #commentForm {
            width: 500px;
        }

        #commentForm label {
            width: 250px;
        }

        #commentForm label.error,
        #commentForm input.submit {
            margin-left: 253px;
        }

        #signupForm {
            width: 670px;
        }

        #signupForm label.error {
            margin-left: 10px;
            width: auto;
            display: inline;
        }

        #newsletter_topics label.error {
            display: none;
            margin-left: 103px;
        }
    </style>

</head>

<body class="app header-fixed sidebar-fixed aside-menu-off-canvas sidebar-lg-show">
    @include('frontend.pages.verification-core.verheader')
    <div class="app-body">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card" id="card-form">
                        <div class="card-body">
                            <h5 class="card-title">Basic Requirements</h5>
                            <form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                                <div id="smartwizard">
                                    <ul>
                                        <li class="col-sm-3">
                                            <a href="#step-1">
                                                Step 1<br />
                                                <small>Basic Information</small>
                                            </a>
                                        </li>
                                        <li class="col-sm-3">
                                            <a href="#step-2">
                                                Step 2<br />
                                                <small>Documents / Files</small>
                                            </a>
                                        </li>
                                        <li class="col-sm-3">
                                            <a href="#step-3">
                                                Step 3<br />
                                                <small>Bank Details</small>
                                            </a>
                                        </li>
                                        <li class="col-sm-3">
                                            <a href="#step-4">
                                                Step 4<br />
                                                <small>Terms & Conditions</small>
                                            </a>
                                        </li>
                                    </ul>
                                    <br> <br>
                                    <div style="border:none">
                                        <div id="step-1">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-header">Basic Information</div>
                                                        <div class="card-body" style="padding-top : 20px; padding-right : 30px; padding-left : 30px;">
                                                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label" for="text-input">Primary Contact <span class="text-danger">*</span></label>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control" id="text-input" type="text" name="text-input" placeholder="First Name">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Middle Name">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Last Name">
                                                                    </div>

                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label" for="company-name">Company Name</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" id="company-name" type="text" name="company-name" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label" for="contact-phone">Contact Phone</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" id="contact-phone" type="text" name="contact-phone" autocomplete="new-password">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label" for="date-input">Address</label>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control" id="textarea-input" name="textarea-input" rows="3" placeholder="Street.."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label" for="disabled-input">City</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" id="disabled-input" type="text" name="disabled-input">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label" for="disabled-input">State</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" id="disabled-input" type="text" name="disabled-input">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label" for="disabled-input">Zip Code</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" id="disabled-input" type="text" name="disabled-input">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            {{--
                                                            <div id="form-step-0" role="form" data-toggle="validator">
                                                                <div class="form-group">
                                                                    <label for="email">Email address:</label>
                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Write your email address" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-2">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Documents / Files
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <button class="btn btn-primary btn-sm" id="btnAddFile">Add Files</button>
                                                                    </div>
                                                                    <div id="file-holder">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <input class="form-control" type="file" name="files[]">
                                                                                <span class="input-group-append">
                                                                                    <button class="btn btn-ghost-danger verRmvfile" type="button">
                                                                                        <i class="fas fa-times-circle text-danger"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            {{--
                                            <h2>Your Name</h2>
                                            <div id="form-step-1" role="form" data-toggle="validator">
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" name="name" id="email" placeholder="Write your name" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div id="step-3">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-header">Bank Details</div>
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                            {{--
                                            <h2>Your Address</h2>
                                            <div id="form-step-2" role="form" data-toggle="validator">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control" name="address" id="address" rows="3" placeholder="Write your address..." required></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div id="step-4">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Term & Conditions
                                                        </div>
                                                        <div class="card-body">
                                                            <h2>
                                                                Terms and Conditions</h2>
                                                            <p>
                                                                Terms and conditions: Keep your smile :)
                                                            </p>
                                                            <div id="form-step-3" role="form" data-toggle="validator">
                                                                <div class="form-group">
                                                                    <label for="terms">I agree with the T&C</label>
                                                                    <input type="checkbox" id="terms" data-error="Please accept the Terms and Conditions" required>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (false)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title ">
                        Med4Care SRLS
                    </h5>
                    <br>
                    <br />
                    <div class="container">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- Include jQuery Validator plugin -->



    @stack('before-scripts') {!! script(mix('js/manifest.js')) !!} {!! script(mix('js/vendor.js')) !!} {!! script(mix('js/backend.js'))
    !!} @stack('after-scripts')

    <script type="text/javascript">
        $(document).ready(function () {

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                .addClass('btn btn-info')
                .on('click', function () {
                    if (!$(this).hasClass('disabled')) {
                        var elmForm = $("#myForm");
                        if (elmForm) {
                            elmForm.validator('validate');
                            var elmErr = elmForm.find('.has-error');
                            if (elmErr && elmErr.length > 0) {
                                alert('Oops we still have error in the form');
                                return false;
                            } else {
                                alert('Great! we are ready to submit form');
                                elmForm.submit();
                                return false;
                            }
                        }
                    }
                });
            // var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click', function () {
            //         $('#smartwizard').smartWizard("reset");
            //         $('#myForm').find("input, textarea").val("");
            //     });


            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transitionEffect: 'fade',
                toolbarSettings: {
                    toolbarPosition: 'bottom',
                    toolbarExtraButtons: [btnFinish] //btnCancel
                },
                anchorSettings: {
                    markDoneStep: true, // add done css
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                }
            });

            $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if (stepDirection === 'forward' && elmForm) {
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if (elmErr && elmErr.length > 0) {
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

            $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if (stepNumber == 3) {
                    $('.btn-finish').removeClass('disabled');
                } else {
                    $('.btn-finish').addClass('disabled');
                }
            });

            $(document).on('click', '#btnAddFile', function(){
                $('#file-holder').append(_fileContent());
            });

            $(document).on('click', '.verRmvfile', function(){ 
                var divContent = $("#file-holder").find('.input-group');

                if(divContent.length > 1){
                    $(this).parent().parent().parent().remove(); 
                }else{
                    alert('Cannot be deleted');
                }
            });

            function _fileContent(){
                return `<div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="file" name="files[]">
                        <span class="input-group-append">
                            <button class="btn btn-ghost-danger verRmvfile" type="button">
                                <i class="fas fa-times-circle   text-danger "></i>
                            </button>
                        </span>
                    </div>
                </div>`;
            }


        });
    </script>














</body>

</html>
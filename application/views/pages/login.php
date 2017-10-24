

<script>
    $(document).ready(function () {
        function save()
        {
            $('#btnLogin').text('saving...'); //change button text
            $('#btnLogin').attr('disabled', true); //set button disable 
            var url;

            if (save_method == 'add') {
                url = "<?php echo site_url('med/ajax_add') ?>";
            } else {
                url = "<?php echo site_url('med/ajax_change_status') ?>";
            }

            // ajax adding data to database

            var formData = new FormData($('#form')[0]);
            $.ajax({
                url: "<?php echo site_url('gittest/login_check') ?>/",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function (data)
                {

                    if (data.status) //if success close modal and reload ajax table
                    {
      
                       swal({
                            title: "Success",
                            type: "success",
                            timer: 1500,
                            showConfirmButton: false
                        },
                                function () {
                                    location.reload();
                                }
                        );
                    } else
                    {
                        for (var i = 0; i < data.inputerror.length; i++)
                        {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }



                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error ');


                }
            });
        }
    });

</script>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand " href="#page-top">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link " href="<?php echo base_url() ?>git">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url() ?>login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 

<div class="container">

    <h2 class="text-center" style="margin-top: 150px">Contact Me</h2>
    <hr class="star-primary">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <!--            <form name="sentMessage" id="contactForm" novalidate>-->

            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input class="form-control" id="email" type="email" placeholder="Email Address" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Password</label>
                            <input class="form-control" id="password" type="password" placeholder="Password" required data-validation-required-message="Please enter password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div class="form-group" >
                        <button type="button" id="btnLogin" onclick="save()" class="btn btn-success btn-lg">Login</button>

                    </div>
                </form>
            </div>
            <!--            </form>-->
        </div>
    </div>
</div>
</section>







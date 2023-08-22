<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
</head>
<style>
    * {
        padding: 0;
        margin: 0 !important;
        box-sizing: border-box;
    }

    .error {
        color: red;
        font-style: italic;
        margin-top: 5px;
    }
</style>

<body class="vh-100">
    <div class="d-flex justify-content-center align-items-center h-100 flex-column">
        <h1>Contact Us</h1>
        <form action="<?php echo base_url('Welcome/send_mail'); ?>" method="post" class="p-3">
            <div class="form-group"> <label for="from">Your Email Address:</label>
                <input type="email" class="form-control form-control-lg" id="from" name="from" required>
                <?php if (isset($form_error)) { ?>
                    <small class=" input-form-error">
                        <?php echo form_error("title"); ?>
                    </small>
                <?php } ?>
                <br>
            </div>

            <div class="form-group"> <label for="name">Name:</label>
                <input type="text" class="form-control form-control-lg" id="name" name="name">
                <?php if (isset($form_error)) { ?>
                    <small class=" input-form-error">
                        <?php echo form_error("name"); ?>
                    </small>
                <?php } ?>
                <br>
            </div>
            <div class="form-group"> <label for="subject">Subject:</label>
                <input type="text" class="form-control form-control-lg" id="subject" name="subject">
                <?php if (isset($form_error)) { ?>
                    <small class=" input-form-error">
                        <?php echo form_error("subject"); ?>
                    </small>
                <?php } ?>
                <br>
            </div>
            <div class="form-group"> <label for="message">Message:</label>
                <textarea type="text" class="form-control" id="message" rows="5" name="message"></textarea>
                <?php if (isset($form_error)) { ?>
                    <small class=" input-form-error">
                        <?php echo form_error("message"); ?>
                    </small>
                <?php } ?>
                <br>
            </div>

            <button type="submit" class="btn btn-primary">Send Email</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
<h1 class="grid--cell fl1 fs-headline1 mb0">Login</h1>
<div class="overflow-hidden px8 mxn8">
    <div class="contact-page-sections grid gs64 fw-wrap grid__allcells6 clear-both">
        <div class="contact-form grid--cell">
            <span style="color:rgb(250, 2, 2)"> <?php if (isset($errorMessage)) {
                                                    echo $errorMessage;
                                                } ?></span>
            <form class="grid fd-column gs16 gsy" action="login-page" method="post">
                <div class="grid fd-column gs4 gsy">
                    <label class="grid--cell s-label" for="uname"><b>Username</b></label>
                    <input class="grid--cell s-input" type="text" placeholder="Enter Username" name="uname" required>
                </div>

                <div class="grid fd-column gs4 gsy">
                    <label class="grid--cell s-label" for="psw"><b>Password</b></label>
                    <input class="grid--cell s-input" type="password" placeholder="Enter Password" name="psw" required>
                </div>

                <div class="grid fd-column gs4 gsy">
                    <button type="submit">Login</button>
                    <label class="mt32">
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="grid fd-column gs4 gsy" style="background-color:#f1f1f1">
                    <span class="">Forgot <a href="#">password?</a></span>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
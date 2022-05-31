<h1 class="grid--cell fl1 fs-headline1 mb0">Contact</h1>
<div class="contact-form-custom-content">
    <p>You have questions regarding our services or our company?</p>

    <p>Please, use our contact form – We gladly answer your questions.</p>
</div>
<hr>
<div class="overflow-hidden px8 mxn8">
    <div class="contact-page-sections grid gs64 fw-wrap grid__allcells6 clear-both">
        <div class="contact-form grid--cell">
            <span style="color:rgb(250, 2, 2)"> <?php if (isset($errorMessage)) {
                                                    echo $errorMessage;
                                                } ?></span>
            <h2>Contact Support</h2>

            <form class="grid fd-column gs16 gsy" id="send-email" method="POST" action="/contact-submit">
                <div class="grid fd-column gs4 gsy">
                    <label class="grid--cell s-label" for="fname">First Name</label>
                    <input class="grid--cell s-input" type="text" id="fname" name="fname" value="" required placeholder="your first name">
                </div>
                <div class="grid fd-column gs4 gsy">
                    <label class="grid--cell s-label" for="lname">Last Name</label>
                    <input class="grid--cell s-input" type="text" id="lname" name="lname" value="" required placeholder="your last name">
                </div>
                <div class="grid fd-column gs4 gsy">
                    <label class="grid--cell s-label" for="email">Your email</label>
                    <input class="grid--cell s-input" type="text" id="email" name="email" value="" required placeholder="your email">
                </div>

                <div class="grid fd-column gs4 gsy">
                    <label class="grid--cell s-label" for="details"><span id="detail-prompt">Please describe your
                            problem</span> <span class="detail-optional" style="display:none">(optional)</span></label>
                    <textarea rows="9" class="grid--cell s-input" name="details" id="details" required maxlength="250"></textarea>
                </div>
                <div>
                </div>
                <p>
                    <input type="submit" class="mt32" id="submit" value="submit"><br>
                    <span class="form-error" style="display: none;">all fields are required</span>
                </p>
            </form>
            <br>
        </div>
    </div>
</div>
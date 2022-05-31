<h1 itemprop="name" class="grid--cell fs-headline1 fl1 ow-break-word mb8">
    <?php echo $answersArr['question']['info'][0]['title'] ?>
</h1>

<div class="grid fw-wrap pb8 mb16 bb bc-black-2">
    <div class="grid--cell ws-nowrap mb8">
        <span itemprop="viewedCount" itemscope="" itemtype="http://schema.org/Answer" class="fc-light mr2">Viewed</span>
        <?php echo $answersArr['question']['info'][0]['viewed'] ?> times
    </div>
</div>

<div class="question">
    <div class="post-layout">
        <div class="postcell post-layout--right">
            <div class="post-text" itemprop="text" itemscope="" itemtype="http://schema.org/Question">
                <?php echo $answersArr['question']['info'][0]['body'] ?>
            </div>
            <div class="post-taglist grid gs4 gsy fd-column">
            </div>

            <div class="mb0 ">
                <div class="mt16 grid gs8 gsy fw-wrap jc-end ai-start pt4">
                    <div class="grid--cell mr16" style="flex: 1 1 100px;">
                        <div class="post-menu">
                            <!--<a href="<?php /*echo $fullUrl*/ ?>" class="js-share-link js-gps-track">share</a>-->
                            <!-- Your share button code -->
                            <!--<div class="fb-like align-middle" data-href="<?php echo $fullUrl ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>-->
                            <span class="lsep">|</span>
                            <a href="/add-question-comment/<?php echo $answersArr['question']['info'][0]['question_id'] ?>/edit" class="suggest-edit-post js-gps-track align-middle">add answer</a>
                        </div>
                    </div>

                    <div class="post-signature owner grid--cell">
                        <div class="user-info ">
                            <div class="user-action-time">asked
                                <span itemprop="dateCreated" itemscope="" itemtype="http://schema.org/Question" class="relativetime"><?php echo $answersArr['question']['info'][0]['created_date'] ?> at
                                    <?php echo $answersArr['question']['info'][0]['created_time'] ?></span>
                            </div>
                            <div class="user-details">
                                <a itemprop="author" itemscope="" itemtype="http://schema.org/Person" href="/user-details/<?php echo $answersArr['question']['info'][0]['nickname'] ?>"><?php echo $answersArr['question']['info'][0]['nickname'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="js-post-notices post-layout--full">
        </div>

        <div class="post-layout--right">
            <div id="" class="comments js-comments-container bt bc-black-2 mt12 ">
                <ul class="comments-list js-comments-list">
                    <?php foreach ($answersArr['question']['comments'] as $item) { ?>
                        <li id="" class="comment js-comment ">
                            <div class="js-comment-actions comment-actions">
                                <div class="comment-score js-comment-edit-hide">
                                </div>
                            </div>
                            <div class="comment-text js-comment-text-and-form">
                                <div class="comment-body js-comment-edit-hide">

                                    <span class="comment-copy"><?php echo $item['comment_text'] ?></span>

                                    –&nbsp;
                                    <a itemprop="author" itemscope="" itemtype="http://schema.org/Person" href="/user-details/<?php echo $item['nickname'] ?>" title="" class="comment-user"><?php echo $item['nickname'] ?></a>
                                    <span class="comment-date" dir="ltr"><?php echo $item['created_date'] ?> at
                                        <?php echo $item['created_time'] ?></span>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div id="">
                <a href="/add-question-comment/<?php echo $answersArr['question']['info'][0]['question_id'] ?>" class="js-add-link comments-link disabled-link">add a comment</a>
                <span class="js-link-separator dno">&nbsp;|&nbsp;</span>
            </div>
        </div>
    </div>
</div>

<div id="answers">
    <div id="answers-header">
        <div class="subheader answers-subheader">
            <h2 itemprop="answerCount" itemscope="" itemtype="http://schema.org/Answer">
                <?php echo count($answersArr['answers']) . " "; ?> Answers
            </h2>
            <div>
            </div>
        </div>
    </div>

    <?php foreach ($answersArr['answers'] as $item) {; ?>
        <div id="" class="answer accepted-answer">
            <div class="post-layout px-md-4 px-sm-4 px-3">
                <div class="answercell post-layout--right">
                    <div class="post-text" itemprop="text" itemscope="" itemtype="http://schema.org/Answer"><?php echo $item['info']['body_text'] ?></div>
                    <div class="grid mb0 fw-wrap ai-start jc-end gs8 gsy">
                        <div class="grid--cell mr16" style="flex: 1 1 100px;">
                            <div class="post-menu">
                                <!--<a href="" class="js-share-link js-gps-track">share</a>-->
                                <!-- Your share button code -->
                                <!--<div class="fb-share-button align-middle" data-href="<?php echo $fullUrl ?>" data-layout="button_count">
                                </div>-->
                                <!-- Your like button code -->
                                <div itemprop="shareURL" itemscope="" itemtype="http://schema.org/Answer" class="fb-like align-middle" data-href="<?php echo $fullUrl ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                            </div>
                        </div>

                        <div class="post-signature grid--cell fl0">
                            <div class="user-info ">
                                <div class="user-action-time">
                                    answered <span class="relativetime"><?php echo $item['info']['created_date'] ?> at
                                        <?php echo $item['info']['created_time'] ?></span>
                                </div>
                                <div class="user-details">
                                    <a itemprop="author" itemscope="" itemtype="http://schema.org/Person" href="/user-details/<?php echo $item['info']['an_nickname'] ?>"><?php echo $item['info']['an_nickname'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post-layout--right">
                    <div id="">
                        <ul class="comments-list js-comments-list">
                            <?php foreach ($item['comments'] as $itemComment) { ?>
                                <li id="" class="comment js-comment ">
                                    <div class="js-comment-actions comment-actions">
                                        <div class="comment-score js-comment-edit-hide">
                                        </div>
                                    </div>
                                    <div class="comment-text js-comment-text-and-form">
                                        <div class="comment-body js-comment-edit-hide">
                                            <span class="comment-copy"><?php echo $itemComment['comment_text'] ?></span>
                                            –&nbsp;<a itemprop="author" itemscope="" itemtype="http://schema.org/Person" href="/users/593105/aaron-dufour" class="comment-user"><?php echo $itemComment['ac_nickname'] ?></a>
                                            <span class="comment-date"><?php echo $itemComment['created_date'] ?> at
                                                <?php echo $itemComment['created_time'] ?></span>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <a href="/add-answer-comment/<?php echo isset($itemComment['comment_id']) ?? $itemComment['comment_id'] ?>" class="js-add-link comments-link disabled-link">add a comment</a>
                        <span class="js-link-separator dno">&nbsp;|&nbsp;</span>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<form id="post-form" action="/add-answer/<?php echo $answersArr['question']['info'][0]['question_id'] ?>" method="post" class="js-add-answer-component post-form">
    <input type="hidden" id="post-id" value="50390983">
    <input type="hidden" id="qualityBanWarningShown" name="qualityBanWarningShown" value="false">
    <input type="hidden" name="referrer" value="https://www.google.com/">
    <h2 class="space">
        <label class="wmd-input-label" for="wmd-input">Your Answer</label>
    </h2>

    <div id="post-editor" class="post-editor js-post-editor">

        <div class="ps-relative">

            <div class="wmd-container mb8">
                <div id="wmd-button-bar" class="wmd-button-bar btr-sm">
                    <ul id="wmd-button-row" class="wmd-button-row">
                        <li class="wmd-button" id="wmd-bold-button" title="Strong <strong> Ctrl+B"><span style="background-position: 0px 0px;"></span></li>
                        <li class="wmd-button" id="wmd-italic-button" title="Emphasis <em> Ctrl+I"><span style="background-position: -20px 0px;"></span></li>
                        <li class="wmd-spacer wmd-spacer1" id="wmd-spacer1"></li>
                        <li class="wmd-button" id="wmd-link-button" title="Hyperlink <a> Ctrl+L"><span style="background-position: -40px 0px;"></span></li>
                        <li class="wmd-button" id="wmd-quote-button" title="Blockquote <blockquote> Ctrl+Q"><span style="background-position: -60px 0px;"></span></li>
                        <li class="wmd-button" id="wmd-code-button" title="Code Sample <pre><code> Ctrl+K"><span style="background-position: -80px 0px;"></span></li>
                        <li class="wmd-button" id="wmd-image-button" title="Image <img> Ctrl+G"><span style="background-position: -100px 0px;"></span></li>
                        <li class="wmd-button wmd-snippet-button" id="wmd-snippet-button" title="JavaScript/HTML/CSS snippet Ctrl-M"></li>
                        <li class="wmd-spacer wmd-spacer2" id="wmd-spacer2"></li>
                        <li class="wmd-button" id="wmd-olist-button" title="Numbered List <ol> Ctrl+O"><span style="background-position: -120px 0px;"></span></li>
                        <li class="wmd-button" id="wmd-ulist-button" title="Bulleted List <ul> Ctrl+U"><span style="background-position: -140px 0px;"></span></li>
                        <li class="wmd-button" id="wmd-heading-button" title="Heading <h1>/<h2> Ctrl+H"><span style="background-position: -160px 0px;"></span></li>
                        <li class="wmd-button" id="wmd-hr-button" title="Horizontal Rule <hr> Ctrl+R"><span style="background-position: -180px 0px;"></span></li>
                        <li class="wmd-spacer wmd-spacer3" id="wmd-spacer3"></li>
                        <li class="wmd-button" id="wmd-undo-button" title="Undo - Ctrl+Z"><span style="background-position: -200px -20px;"></span></li>
                        <li class="wmd-button" id="wmd-redo-button" title="Redo - Ctrl+Y"><span style="background-position: -220px -20px;"></span></li>
                        <li class="wmd-spacer wmd-spacer-max"></li>
                        <li class="wmd-button wmd-help-button active-help" id="wmd-help-button" style="right: 0px;" title="Markdown Editing Help"><span style="background-position: -240px 0px;"></span></li>
                    </ul>
                </div>
                <div id="mdhelp" class="mdhelp">
                    <ul id="mdhelp-tabs" class="mdhelp-tabs">
                        <li data-tab="mdhelp-links" href="..." class="js-gps-track" data-gps-track="mdhelp.click({ help_type: 0 })" data-buttons="link">Links</li>
                        <li data-tab="mdhelp-images" data-gps-track="mdhelp.click({ help_type: 1 })" data-buttons="image">Images</li>
                        <li data-tab="mdhelp-styles" data-gps-track="mdhelp.click({ help_type: 2 })" data-buttons="bold,italic,heading">Styling/Headers</li>
                        <li data-tab="mdhelp-lists" data-gps-track="mdhelp.click({ help_type: 3 })" data-buttons="olist,ulist">Lists</li>
                        <li data-tab="mdhelp-blockquotes" data-gps-track="mdhelp.click({ help_type: 4 })" data-buttons="quote">Blockquotes</li>
                        <li data-tab="mdhelp-code" data-gps-track="mdhelp.click({ help_type: 5 })" data-buttons="code">Code</li>
                        <li data-tab="mdhelp-html" data-gps-track="mdhelp.click({ help_type: 6 })"> HTML </li>
                    </ul>

                    <div class="cbt"></div>
                </div>
                <div class="js-stacks-validation">
                    <div class="ps-relative">
                        <textarea id="wmd-input" name="post-text" class="wmd-input s-input bar0 js-post-body-field processed" data-post-type-id="2" cols="92" rows="15" data-min-length=""></textarea>
                        <div class="grippie bbr-sm" style="margin-right: 0px;"></div>
                    </div>
                    <div class="s-input-message mt4 d-none js-stacks-validation-message"></div>
                </div>
            </div>
        </div>

        <div id="draft-saved" class="draft-saved community-option fl" style="height:24px; display:none;">draft saved</div>
        <div id="draft-discarded" class="draft-discarded community-option fl" style="height:24px; display:none;">draft discarded</div>



        <div id="wmd-preview" class="wmd-preview"></div>
        <div></div>
        <div class="edit-block">
            <input id="fkey" name="fkey" type="hidden" value="9ae60cdbddae8f68f113c7d66f18a733c9a44fd65516829d8924b25ae3fe0f18">
            <input id="author" name="author" type="text">
        </div>

    </div>

    <div class="ps-relative">

        <div class="form-item new-post-login p0 my16">
            <div class="grid gs16 md:fd-column new-login-form">
                <div class="grid fd-column w50 md:w-auto gsy gs8 jc-space-between new-login-left">
                    <h3 class="grid--cell fs-title">Sign up or <a id="login-link" href="/login">log in</a></h3>
                    <!--<div class="grid--cell s-btn s-btn__muted s-btn__outlined s-btn__icon google-login" data-ga="[&quot;sign up&quot;,&quot;Sign Up Started - Google&quot;,&quot;New Post&quot;,null,null]">
                        <svg aria-hidden="true" class="svg-icon native iconGoogle" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path>
                            <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17z" fill="#34A853"></path>
                            <path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07z" fill="#FBBC05"></path>
                            <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3z" fill="#EA4335"></path>
                        </svg> Sign up using Google
                    </div>-->
                    <!--<div class="grid--cell s-btn s-btn__muted s-btn__icon facebook-login" data-ga="[&quot;sign up&quot;,&quot;Sign Up Started - Facebook&quot;,&quot;New Post&quot;,null,null]">
                        <svg aria-hidden="true" class="svg-icon iconFacebook" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M3 1a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H3zm6.55 16v-6.2H7.46V8.4h2.09V6.61c0-2.07 1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h-2.5z" fill="#4167B2"></path>
                        </svg> Sign up using Facebook
                    </div>-->
                    <div class="grid--cell s-btn s-btn__muted s-btn__outlined s-btn__icon">
                        <a href="/login">Sign up using Email and Password</a>
                    </div>
                </div>
                <!--<input type="hidden" name="use-facebook" class="use-facebook" value="false">
                <input type="hidden" name="use-google" class="use-google" value="false">-->
                <input type="button" class="submit-openid" value="Submit" style="display:none">
                <div class="grid gsy gs8 fd-column w50 md:w-auto new-login-right form-item p0">
                    <h3 class="grid--cell fs-title">Post as a guest</h3>
                    <div class="grid--cell">
                        <div class="grid gs4 gsy fd-column">
                            <label class="s-label" for="display-name">Name</label>
                            <div class="grid ps-relative">
                                <input class="s-input" id="display-name" name="display-name" maxlength="30" type="text" value="" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="grid--cell">
                        <div class="grid gs4 gsy fd-column">
                            <div class="grid--cell">
                                <div class="grid gs2 gsy fd-column">
                                    <label class="grid--cell s-label" for="m-address">Email</label>
                                    <p class="grid--cell s-description">Required, but never shown</p>
                                </div>
                            </div>
                            <div class="grid ps-relative">
                                <input class="s-input js-post-email-field" id="m-address" name="m-address" type="text" value="" size="40" placeholder="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <noscript>
            <h3 class="grid--cell fs-title">Post as a guest</h3>
            <div class="grid--cell">
                <div class="grid gs4 gsy fd-column">
                    <label class="s-label" for="display-name">Name</label>
                    <div class="grid ps-relative">
                        <input class="s-input" id="display-name" name="display-name" maxlength="30" type="text" value="" placeholder="" />
                    </div>
                </div>
            </div>
            <div class="grid--cell">
                <div class="grid gs4 gsy fd-column">
                    <div class="grid--cell">
                        <div class="grid gs2 gsy fd-column">
                            <label class="grid--cell s-label" for="m-address">Email</label>
                            <p class="grid--cell s-description">Required, but never shown</p>
                        </div>
                    </div>
                    <div class="grid ps-relative">
                        <input class="s-input js-post-email-field" id="m-address" name="m-address" type="text" value="" size="40" placeholder="" />
                    </div>
                </div>
            </div>

        </noscript>

    </div>

    <div class="form-submit cbt grid gsx gs4">
        <button id="submit-button" class="grid--cell s-btn s-btn__primary s-btn__icon" type="submit" autocomplete="off">
            Post Your Answer </button>
        <button class="grid--cell s-btn s-btn__danger discard-answer dno">
            Discard
        </button>
        <p class="privacy-policy-agreement">
            By clicking “Post Your Answer”, you agree to our <a href="/privacy-policy" name="tos" target="_blank" class="-link">terms of service</a>, <a href="/privacy-policy" name="privacy" target="_blank" class="-link">privacy policy</a> and <a href="/privacy-policy" name="cookie" target="_blank" class="-link">cookie policy</a><input type="hidden" name="legalLinksShown" value="1">
        </p>
    </div>
    <div class="js-general-error general-error cbt d-none"></div>
</form>
<?php
defined('_JCMS_') or header('Location: ../../');
global $alamat, $telpweb, $emailweb;
$namamodul = basename(dirname(__FILE__));
$home = _BERANDA_;

$isibloknyo .= '<div class="tg-map-info tg-haslayout">
                    <div id="tg-map" class="tg-map">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="contact-info tg-haslayout">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="col-info">
                                        <p><i class="fa fa-map-marker"></i> '.$alamat.'</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="col-info">
                                        <p><i class="fa fa-phone"></i> Telepon: '.$telpweb.'</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="col-info">
                                        <p><i class="fa fa-envelope"></i> <a href="mailto:'.$emailweb.'">Email: '.$emailweb.'</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tg-main-section tg-haslayout">
                        <div class="container contact_wrap">
                            
                            <form class="form-contactus contact_form">
                                <div class="message_contact" style="display:none;"></div>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="username" class="form-control" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <i class="fa fa-envelope"></i>
                                                <input type="email" name="useremail" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <i class="fa fa-globe"></i>
                                                <input type="url" name="website" class="form-control" placeholder="Your Website">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <i class="fa fa-paper-plan-o"></i>
                                                <textarea class="theme-textarea" name="description" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="#" class="tg-theme-btn contact_now">send</a>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            
                        </div>
                    </div>
                    <!--************************************
                                    Map Section End
                    *************************************-->
                </div>';

?>

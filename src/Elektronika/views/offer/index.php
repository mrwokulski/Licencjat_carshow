<style>
    .txtcenter {
        text-align: center;
    }
    <?php $id = Session::get('id_offer'); ?>

</style>
<div class="container">
    <div class="row row-margin">
        <div class="col-md-6 userpanel-view-table" >
            <br/>
            <h2 class="txtcenter" id="maker_top"></h2>
            <hr/>

            <div id="slider"></div>
            <div id="images"></div>

        </div>
        <div class="col-md-6 userpanel-view-table" style="padding-top: 62px;">
            <hr/>
            <h1 style="text-align: center;" id="price"></h1>
            <hr/>
            <div style="padding-left: 10%;">
                <div class="row">
                    <div class="col-md-6">
                        <p id="maker"></p>
                        <p id="type"></p>
                        <p id="city"></p>
                        <p id="date"></p>
                    </div>
                    <div class="col-md-6">
                        <div style="margin: 0 ;">
                            <?php
                            if(!empty(Session::get('log')) && View::showArrayValue('log',6) != $this->id ) {
                                if ($this->status == 0)
                                    echo '<a href="' . URL . 'favourite/addFromOffer/' . $id . '"> <img src="' . URL . 'public/images/favicon_0.png" style="width: 30%; height: 30%; margin-left: auto; margin-right: auto; display: block;"/> </a>';
                                else
                                    echo '<a href="' . URL . 'favourite/addFromOffer/' . $id . '"> <img src="' . URL . 'public/images/favicon.png" style="width: 30%; height: 30%; margin-left: auto; margin-right: auto; display: block;"/> </a>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <p style="text-align: center; font-size: 25px" id="name"></p>
            <div style="padding-left: 10%;">
                Kontakt:
            </div><p style="text-align: center; font-size: 30px" id="tel"></p>

            <?php

            if(!empty(Session::get('log')) && View::showArrayValue('log',6) != $this->id ){

                echo '<p style="text-align: center; font-size: 30px">Wyślij Wiadomość</p>';
                echo '<form action="'.URL. "userpanel/sendMessage/$this->id".'" method="post"  enctype="multipart/	form-data"  style="text-align:center; margin: 0 auto;">
							<textarea class="form-control" rows="5" name="message" id="message" style="background-color: #fff3f3;"></textarea>
							<input name="offer" type="hidden" value="'.$id.'">
							<input type="submit" value="Wyślij" class="btn btn-search" style="margin-top: 10px;">
						  </form>';

            }

            ?>
        </div>
        <div class="col-md-12 userpanel-view-table">
            <hr/>
            <p class="txtcenter" id="description"></p>
        </div>
    </div>


    <script src="<?= URL ?>public/js/ajaxOffer.js"></script>
    <script>
        <?= "window.onload = getOffer($id,\"".URL."\");" ?>
        <?= "window.onload = setImage(1,$id, \"".URL."\");" ?>
    </script>


<div class="nicescroll">
                    <ul class="nav nav-tabs text-xs-center">
                        <li class="nav-item">
                            <a href="#home-2"  class="nav-link active" data-toggle="tab" aria-expanded="false">
                                Activity
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home-2">
                            <div class="timeline-2">
                                <?php if($load_trail->num_rows() > 0){ ?>
                                <?php foreach($load_trail->result() as $data){ ?>
                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted"><?php echo tgl_indo($data->date); ?></small>
                                        <p><strong><a href="<?php echo $data->idsdm; ?>" class="text-info"><?php echo $data->fullname; ?></a></strong> <?php echo $data->description; ?> 
                                        <?php if($data->item_id == '')
                                        {}else{ ?><strong>"<?php echo $data->item_id; ?>"</strong><?php } ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- end nicescroll -->
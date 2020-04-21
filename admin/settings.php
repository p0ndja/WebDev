<div class="card-columns">
                    <div class="card mb-3">
                        <div class="card-body card-text mb-3">
                            <div class="card-title card-text">
                                <h1>Global Variable
                                </h1>
                            </div>
                            <hr>
                            <?php
$cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[Global]%'");
while($get_config = mysqli_fetch_array($cor, MYSQLI_ASSOC)) {
$b = $get_config['bool'];
if ($b == true) $b = ' checked';
else $b = ' ';
                ?>
                            <!-- Material checked -->
                            <div class="switch switch-warning mb-1 ">
                                <label>
                                    <input type="checkbox" name="<?php echo $get_config['name'];?>" <?php echo $b; ?>>
                                    <span class="lever">
                                    </span>
                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                        title="<?php echo $get_config['description'] . ' (' . $get_config['name'] . ')';?>">
                                        <?php echo $get_config['title'];?>
                                    </a>
                                </label>
                            </div>
                            <?php if ($get_config['haveVal']) { ?>
                            <input type="text" id="<?php echo $get_config['name']; ?>"
                                name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate "
                                <?php if (!$get_config['haveVal']) echo 'style="display: none"'; ?> value="<?php echo $get_config['val'];?>" placeholder="<?php echo $get_config['valDescription'];?>">
                            <?php } ?>
                            <hr>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body card-text mb-3">
                            <div class="card-title card-text">
                                <h1>Achievement Variable
                                </h1>
                            </div>
                            <hr>
                            <?php
$cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[Achievement]%'");
while($get_config = mysqli_fetch_array($cor, MYSQLI_ASSOC)) {
$b = $get_config['bool'];
if ($b == true) $b = ' checked';
else $b = ' ';
                        ?>
                            <!-- Material checked -->
                            <div class="switch switch-warning mb-1 ">
                                <label>
                                    <input type="checkbox" name="<?php echo $get_config['name'];?>" <?php echo $b; ?>>
                                    <span class="lever">
                                    </span>
                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                        title="<?php echo $get_config['description'] . ' (' . $get_config['name'] . ')';?>">
                                        <?php echo $get_config['title'];?>
                                    </a>
                                </label>
                            </div>
                            <?php if ($get_config['haveVal']) { ?>
                            <input type="text" id="<?php echo $get_config['name']; ?>"
                                name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate "
                                <?php if (!$get_config['haveVal']) echo 'style="display: none"'; ?> value="<?php echo $get_config['val'];?>" placeholder="<?php echo $get_config['valDescription'];?>">
                            <?php } ?>
                            <hr>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body card-text mb-3">
                            <div class="card-title card-text">
                                <h1>Home Variable
                                </h1>
                            </div>
                            <hr>
                            <?php
$cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[Home]%'");
while($get_config = mysqli_fetch_array($cor, MYSQLI_ASSOC)) {
$b = $get_config['bool'];
if ($b == true) $b = ' checked';
else $b = ' ';
?>
                            <!-- Material checked -->
                            <div class="switch switch-warning mb-1 ">
                                <label>
                                    <input type="checkbox" name="<?php echo $get_config['name'];?>" <?php echo $b; ?>>
                                    <span class="lever">
                                    </span>
                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                        title="<?php echo $get_config['description'] . ' (' . $get_config['name'] . ')';?>">
                                        <?php echo $get_config['title'];?>
                                    </a>
                                </label>
                            </div>
                            <?php if ($get_config['haveVal']) { ?>
                            <input type="text" id="<?php echo $get_config['name']; ?>"
                                name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate "
                                <?php if (!$get_config['haveVal']) echo 'style="display: none"'; ?> value="<?php echo $get_config['val'];?>" placeholder="<?php echo $get_config['valDescription'];?>">
                            <?php } ?>
                            <hr>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body card-text mb-3">
                            <div class="card-title card-text">
                                <h1>User Variable
                                </h1>
                            </div>
                            <hr>
                            <?php
$cor = mysqli_query($conn, "SELECT * FROM `config` WHERE title LIKE '%[User]%'");
while($get_config = mysqli_fetch_array($cor, MYSQLI_ASSOC)) {
$b = $get_config['bool'];
if ($b == true) $b = ' checked';
else $b = ' ';
?>
                            <!-- Material checked -->
                            <div class="switch switch-warning mb-1 ">
                                <label>
                                    <input type="checkbox" name="<?php echo $get_config['name'];?>" <?php echo $b; ?>>
                                    <span class="lever">
                                    </span>
                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                        title="<?php echo $get_config['description'] . ' (' . $get_config['name'] . ')';?>">
                                        <?php echo $get_config['title'];?>
                                    </a>
                                </label>
                            </div>
                            <?php if ($get_config['haveVal']) { ?>
                            <input type="text" id="<?php echo $get_config['name']; ?>"
                                name="<?php echo $get_config['name']; ?>" class="form-control form-control-sm validate "
                                <?php if (!$get_config['haveVal']) echo 'style="display: none"'; ?> value="<?php echo $get_config['val'];?>" placeholder="<?php echo $get_config['valDescription'];?>">
                            <?php } ?>
                            <hr>
                            <?php } ?>
                        </div>
                    </div>
                </div>
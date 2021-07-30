<?php require './actions/includes/header.php';?>
<?php include ('./includes/the-header.php');?>
<title>ویرایش محصول  - ال سی ملودی</title>
<link rel="stylesheet" href="./assets/css/edit-product.css">
<?php include ('./includes/the-close-head.php');?>
<?php include ('./includes/the-banner.php'); ?>

    <div id='main-layer'>
      <?php include('./includes/the-menu.php'); ?>
      <div id="base-edit-product" class="def-border set-two-font">



        <?php
        //get id and check that
        $pid = $_GET['id'];
        $pid = (int)$pid;
        if(empty($_GET))
        {
          show_result("error","please enter product id!","","","Lc Melody","current"); //mode , text , button lable , button target ,title , window (current)
        }



        //fetch customer information
        $sql_search = "SELECT p_brand,p_model,p_title,p_description,p_status,p_priority_TS,p_discount,p_summary_desc,p_type,p_price,p_amount FROM t_product WHERE p_id='$pid';";
        $result_search = $conn->query($sql_search);
        if ($result_search->num_rows > 0)
        {
          while($row = $result_search->fetch_assoc())
          {
                 $ptitle = $row['p_title'];
                 $pbrand = $row['p_brand'];
                 $pmodel = $row['p_model'];
                 $pdescription = $row['p_description'];
                 $pvisible = $row['p_status'];
                 $pprioirty = $row['p_priority_TS'];
                 $pdiscount = $row['p_discount'];
                 $ptechincal = $row['p_summary_desc'];
                 $pgroup = $row['p_type'];
                 $pprice = $row['p_price'];
                 $pamount = $row['p_amount'];
          }
        }
        else
        {
          show_result("error","Product (id=$pid) isn\'t exists","","","Lc Melody","current"); //mode , text , button lable , button target ,title , window (current)
        }
        ?>





        <section id="parrent-section-style">
            <h1 style="font-size:35px;margin:15px 2.50%;">ویرایش محصول</h1>
            <div id="buttons-divider">
                  <section id="right-side" class="sides-style">
      <form action="./actions/a-edit-product.php" method="post">

                    <div class="divider-inputs">
                      <h2 class="labels-style floatright">عنوان محصول</h2>
                      <input class="inputs-style" type="text" value="<?php echo $ptitle;?>" name="ptitle">
                    </div>
                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">دسته بندی</h2>
                       <input  class="inputs-style" type="text" value="<?php echo $pgroup;?>" name="pgroup">
                    </div>
                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">تخفیف</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pdiscount;?>" name="pdiscount">
                    </div>
                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">تعداد موجودی</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pamount;?>" name="pamount">
                    </div>
                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">اولویت در نمایش</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pprioirty;?>" name="ppriority">
                    </div>

                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">نمایش داده شود</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pvisible;?>" name="pvisible">
                    </div>
                  </section>


                  <section id="left-side" class="sides-style">
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">شناسه محصول</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pid;?>" name="pid" readonly>
                    </div>
                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">برند</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pbrand;?>" name="pbrandd">
                    </div>
                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">مدل</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pmodel;?>" name="pmodel">
                    </div>
                    <br/>
                    <div class="divider-inputs">
                       <h2 class="labels-style floatright">قیمت</h2>
                       <input  class="inputs-style dirltr" type="text" value="<?php echo $pprice;?>" name="pprice">
                    </div>
                  </section>
              </div>
              <section id="section-more-information">
                <div id="divider-techniocal-info">
                   <h2 class="title-more-description">مشخصات فنی</h2>
                   <textarea id="technical-information" class="textareas-more-description" value="<?php echo $ptechincal;?>" name="ptechincal"></textarea>
                </div>

                <div id="divider-final-information">
                   <h2 class="title-more-description">توضیحات تکمیلی</h2>
                   <textarea id="final-information" class="textareas-more-description" value="<?php echo $pdescription;?>" name="pdescription"></textarea>
                </div>

                <br/>
              </section>

              <section id="section-pictures">
                <div class="divider-base-pictures">
                    <h2 class="text-upload-pictures"> تصویر یک</h2>
                    <button type="button" onclick="window.open('upload-file.php?target=ep&product=<?php echo $pid;?>&place=1');">browse</button>
                </div>

                <div class="divider-base-pictures">
                    <h2 class="text-upload-pictures">تصویر دو</h2>
                    <button type="button" onclick="window.open('upload-file.php?target=ep&product=<?php echo $pid;?>&place=2');">browse</button>
                </div>

                <div class="divider-base-pictures">
                    <h2 class="text-upload-pictures">تصویر سه</h2>
                    <button type="button" onclick="window.open('upload-file.php?target=ep&product=<?php echo $pid;?>&place=3');">browse</button>
                </div>

                <div class="divider-base-pictures">
                    <h2 class="text-upload-pictures">تصویر چهار</h2>
                    <button type="button" onclick="window.open('upload-file.php?target=ep&product=<?php echo $pid;?>&place=4');">browse</button>
                </div>
              </section>

              <section id="base-buttons">
                  <button id="button-delete-product" class="style-buttons cursor-pointer" type="button" name="button">حذف محصول</button>
                  <input id="button-save-edits-product" class="style-buttons cursor-pointer" type="submit" value="ذخیره تغییرات">
                </form>
              </section>
        </section>


      </div>
    </div>
  </body>
</html>
<?php require './actions/includes/footer.php';?>
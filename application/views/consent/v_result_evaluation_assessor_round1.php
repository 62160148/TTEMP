<!--
    /*
    * v_result_evaluation_assessor_round_1
    * display for result evluation 1 Round of assessor (ประวัติการลงคะแนนแบบฟอร์มการประเมิน 1 รอบ)
    * @author Thitima Popila and Ponprapai Atsawanurak
    * @input  -
    * @output -
    * @Create date : 2565-04-13 
    */
-->

<!-- CSS -->
<style>
table {
    width: 100%;
}

#card_radius {
    margin-top: 15px;
    margin-bottom: 15px;
    border-radius: 20px;
    min-height: 300px;
    width: auto;
}

thead,
tbody,
tfoot,
tr,
td,
th {
    border-color: inherit;
    border-style: solid;
    border-width: 1px;
}

.table tbody tr:last-child td {
    border-width: 1px;
}

#center_th td {
    text-align: center;
    font-weight: bold;
}

#gray {
    background-color: #E3E3E3;
}

#img {
    display: block;
    margin-left: 150px;
}

/* จัดตำแหน่งชื่อบริษัท */
.center_com {
    padding: 70px;
}

#set_id {
    width: 10px;
}

#set_button {
    font-size: 16px;
}

/* จัดระยะห่างระหว่างปุ่ม */
.btn {
    margin-right: 1rem;
    margin-left: 1rem;
}

#width_col {
    white-space: initial !important;
}
</style>
<!-- End CSS -->

<!-- Javascript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<!-- html -->
<!-- Evaluation form -->
<div class="container">
    <div class="card" id="border-radius">
        <div class="card-header">
            <h2>Result (คะแนนการประเมิน)</h2>
        </div>
        <div class="card-body">
            <!-- Logo บริษัท -->
            <div class="row">
                <div class="col-sm-4">
                    <img src="<?php echo base_url() . 'assests\template\soft-ui-dashboard-main/assets/img/denso_1.png' ?>"
                        width="150" height="150">
                </div>
                <!-- ชื่อบริษัท -->
                <div class="col-sm-8 center_com">
                    <!-- <h4><?php echo $obj_nominee[0]->Company_name ?></h4> -->
                </div>
            </div>
            <!-- ชื่อกรรมการ และวันประเมิน -->
            <div class="row">
                <div class="col-sm-6">
                    <h6>Assessor Name :
                        <!-- <?php echo $obj_assessor[0]->Empname_eng. ' ' . $obj_assessor[0]->Empsurname_eng?></h6> -->
                </div>
                <div class="col-sm-6">
                    <?php $newDate = date("d/m/Y", strtotime($arr_nominee[0]->grp_date)); ?>
                    <h6>Date : <?php echo $newDate ?></h6>
                </div>
            </div>

            <!-- Start data Nominee form evaluation -->
            <div class="table-responsive">
                <!-- Start form evaluation -->
                <form enctype="multipart/form-data" name="evaluation">
                    <table class="table table-bordered table-sm">
                        <tr id="Manage">
                            <th colspan="5" id="gray">
                                <center><b>Stretch Assignment Evaluation Form
                                        <!-- (<?php echo $obj_promote[0]->Position_name?>) </b> -->
                        </tr>
                        <tbody>
                            <tr id="Manage">
                                <!-- ชื่อ-นามสกุล Nominee -->
                                <th width="50px" id="gray">Name - Surname</th>
                                <td colspan="2">
                                    <!-- <?php echo $obj_nominee[0]->Empname_eng. ' ' . $obj_nominee[0]->Empsurname_eng?> -->
                                </td>
                                <!-- ตำแหน่ง Nominee -->
                                <th width="40px" id="gray">Position</th>
                                <td>
                                    <!-- <?php echo $obj_nominee[0]->Position_name?> -->
                                </td>
                            </tr>
                            <tr id="Manage">
                                <!-- แผนก Promote to -->
                                <th width="40px" id="gray">Promote to</th>
                                <td colspan="2">
                                    <!-- <?php echo $obj_promote[0]->Position_name?> -->
                                </td>
                                <!-- แผนก Nominee -->
                                <th width="40px" id="gray">Department/Section</th>
                                <td>
                                    <!-- <?php echo $obj_nominee[0]->Department?> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End table data Nominee -->
                    <br>

                    <!-- Start evaluation form -->
                    <div class="table-responsive">
                        <!-- Start table evaluation form -->
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr id="center_th">
                                    <td rowspan="2" width="300px" id="width_col"
                                        style="vertical-align:middle;text-align: center;">ITems</td>
                                    <td rowspan="2" width="800px" id="width_col"
                                        style="vertical-align:middle;text-align: center;">Points for observation</td>
                                    <td style="vertical-align:middle;text-align: center;">% weight</td>
                                    <td style="vertical-align:middle;text-align: center;">Rating(B)</td>
                                    <td width="100px" style="vertical-align:middle;text-align: center;">Score</td>
                                </tr>
                                <tr id="center_th">
                                    <td>(A)</td>
                                    <td>[Fill score 1-5]</td>
                                    <td>(AxB)</td>
                                </tr>
                                <!--เริ่ม ตารางหัวข้อลงคะแนน-->
                                <?php $count_discription = 0;  //จำนวนหัวข้อย่อยจริงๆเป็นของอันเก่าไม่ต้องทำแต่ขี้เกียจแก้
                                $count_itm = 1; //จำนวนหัวข้อหลัก
                                $weight = 0;
                                for ($i = 0; $i < count($arr_form); $i++) {
                                    if ($i != 0) {
                                        if ($arr_form[$i]->itm_id != $arr_form[$i - 1]->itm_id) {
                                            $count_itm++;
                                        }
                                    }
                                    $weight =  $weight + $arr_form[$i]->des_weight;
                                } //นับหัวข้อหลัก
                                ?>
                                <input type="hidden" id="count_form" value='<?php echo $count_itm ?>'>
                                <?php 
                                for ($i = 0; $i < $count_itm; $i++) { //ลูปตามหัวข้อหลัก?>
                                <?php $count_rowspan = 0;
                                    for ($loop_rowspan = 0; $loop_rowspan < count($arr_form); $loop_rowspan++) {
                                        if ($arr_form[$loop_rowspan]->des_item_id == $arr_form[$i]->itm_id) {
                                            $count_rowspan++;
                                        }
                                    } //นับ discription เพื่อกำหนด rowspan ?>

                                <input type="hidden" value="<?php echo $count_rowspan; ?>" name="row[]"
                                    id="dis_row_<?php echo  $i ; ?>">
                                <?php $loop_dis = 1;
                                    while ($loop_dis <= $count_rowspan) { ?>
                                <tr>
                                    <!--แสดง Item -->
                                    <?php if ($loop_dis === 1) { ?>
                                    <td rowspan="<?php echo $count_rowspan; ?>"
                                        style="vertical-align:middle;text-align: center; width: 50px;" id="width_col">
                                        <?php echo $arr_form[$count_discription]->itm_name; ?>
                                        <br><?php echo $arr_form[$count_discription]->itm_item_detail; ?></b>
                                    </td>
                                    <?php } ?>
                                    <!-- แสดง Disription -->
                                    <td id="width_col">
                                        <?php $pos = strrpos($arr_form[$count_discription]->des_description_eng, "."); //ตัดประโยคโดยหา"."
                                                    echo substr($arr_form[$count_discription]->des_description_eng, 0, $pos + 1); ?>
                                        <br>
                                        <?php echo substr($arr_form[$count_discription]->des_description_eng, $pos + 1, strlen($arr_form[$count_discription]->des_description_eng)) ?>
                                        <?php echo $arr_form[$count_discription]->des_description_th ?>
                                    </td>
                                    <!-- แสดง % Weight -->
                                    <td style="vertical-align:middle;text-align: center;">
                                        <?php echo $arr_form[$count_discription]->des_weight; ?>
                                    </td>
                                    <!-- แสดง point -->
                                    <td style="vertical-align:middle;text-align: center;">
                                        <div class="form-group">
                                            <label for="sel"></label>
                                            <input style="vertical-align:middle;text-align: center;" name="form[]"
                                                id="form_<?php echo $count_discription; ?>"
                                                onchange="calculate_weight()" disabled>
                                                <option value="0">score</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                    </input>
                                        </div>
                                    </td>
                                    <input type="hidden" value="<?php echo $arr_form[$i]->for_id ?>" name="for_id[]"
                                        id="formid_<?php echo $i; ?>">
                                    <!-- แสดง Score -->
                                    <td colspan="2" id="show_weight_<?php echo $count_discription; ?>"
                                        style="vertical-align:middle; text-align: center;"></td>
                                    <input type="text" name="point_list[]"
                                        id="point_list_<?php echo  $count_discription; ?>" value="0" hidden>
                                    <input type="text" id="weight_list_<?php echo $count_discription; ?>"
                                        value=<?php echo $arr_form[$i]->des_weight; ?> hidden>
                                    <?php $count_discription++;
                                                $loop_dis++;
                                    } ?>

                                </tr>
                                <?php } ?>
                                <input type="hidden" id="count_score" value="<?php echo $count_discription ?>">
                                <tr>
                                    <!-- แสดง total -->
                                    <input type="text" id="count_index" value=<?php echo $count_discription; ?> hidden>
                                    <input type="text" name="weight" id="weight" value=<?php echo $weight; ?> hidden>
                                    <input type="text" name="weight-per" id="weight-per"
                                        value=<?php echo $weight * 5; ?> hidden>
                                    <td colspan="2" align='right'><b>Total</b></td>
                                    <!-- แสดง total 100 -->
                                    <td align='center'>100</td>
                                    <!-- แสดง point รวม -->
                                    <td align='center'>
                                        <input type="text" name="total" size='1' disabled style='border: none'>
                                    </td>
                                    <!-- แสดงเปอร์เซ็นคะแนนรวมทั้งหมด -->
                                    <td align='center'>
                                        <input type="text" name="total_weight" size='1' disabled style='border: none' ;>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End table evaluation form -->
                        <br>

                        <!-- Comment -->
                        <div class="form-group">
                            <label for="comment"><b style="font-size: 15px;">Comment :</b></label>
                            <textarea class="form-control" rows="5" id="comment" type="text" name="comment" disabled>
                                <?php echo $arr_performance->per_comment; ?>
                            </textarea>
                        </div>
                        <br>
                        <!-- Q/A -->
                        <div class="form-group">
                            <label for="QnA"><b style="font-size: 15px;">Q/A :</b></label>
                            <textarea class="form-control" rows="5" id="QnA" type="text" name="QnA" disabled>
                                <?php echo $arr_performance->per_q_and_a; ?>
                            </textarea>
                        </div>
                        <br>
                        <!-- input -->
                        <!-- <input type="hidden" name="grn_status" value="<?php echo $arr_nominee[0]->grp_status; ?>"> -->
                        <!-- <input type="hidden" value="<?php echo $obj_assessor[0]->ase_id ?>" name="ase_id" id="ase_id"> -->
                        <!-- <input type="hidden" value="<?php echo $obj_nominee[0]->grn_emp_id ?>" name="emp_id" -->
                            <!-- id="emp_id"> -->
                        <!-- <input type="hidden" value="<?php echo $obj_nominee[0]->grn_id ?>" name="nor_id"> -->
                        <!-- <input type="hidden" value="<?php echo $arr_nominee[0]->grp_id; ?>" name="group_id" -->
                            <!-- id="group_id"> -->
                        <!-- <input type="hidden" value="<?php echo $obj_group_ass[0]->asp_id ?>" name="asp_id" id="asp_id"> -->
                        <!-- end input -->
                    </div>
                </form>
                <!-- End form evaluation -->
            </div>
            <!-- End data form evaluation -->
        </div>
        <!-- End class card-body -->
    </div>
    <!-- End class card -->
</div>
<!-- End class container -->
<!-- End html -->

<script type="text/javascript">
/*
 * calculete
 * คำนวณคะแนนต่างๆ
 * @input  -
 * @output -
 * @author Phatchara Khongthandee and Ponprapai Atsawanurak
 * @Create Date 2565-03-07
 */
$(document).ready(function() {
    /*
     * total_calculete
     * คืนค่าคะแนนรวม
     * @input  form
     * @output -
     * @author Phatchara Khongthandee and Ponprapai Atsawanurak
     * @Create Date 2565-03-07
     */
    $("select").change(function() {
        var toplem = 0;
        var i = 0;
        $("select[name='form[]']").each(function() {

            var w = document.getElementById("weight_list_" + i).value;
            var s = w * parseInt($(this).val());
            toplem = toplem + s;
            i = i + 1;
        })

        $("input[name=total]").val(toplem);
    });

    /*
     * total_calculate_weight
     * คืนค่าคะแนนรวมแบบเปอเซ็น
     * @input  form
     * @output -
     * @author Phatchara Khongthandee and Ponprapai Atsawanurak
     * @Create Date 2565-03-07
     */
    $("select").change(function() {
        var toplem = 0;
        var i = 0;
        var weight = $("#weight-per").val();
        $("select[name='form[]']").each(function() {
            var w = document.getElementById("weight_list_" + i).value;
            var s = w * parseInt($(this).val());
            toplem = toplem + s;
            i = i + 1;

        })

        toplem = Math.round(toplem / weight * 100);
        var a = '%'
        $("input[name=total_weight]").val(toplem + a);

    });


    //คืนค่าคะแนนรวมแบบรายการ
    calculate_weight();

})

/*
 * calculate_weight
 * คืนค่าคะแนนรวมแบบรายการ
 * @input  form, count_index
 * @output -
 * @author Phatchara Khongthandee and Ponprapai Atsawanurak
 * @Create Date 2565-03-07
 */
function calculate_weight() {
    var count = document.getElementById("count_index").value;
    for (i = 0; i < count; i++) {
        var h = document.getElementById("form_" + i).value;
        var w = document.getElementById("weight_list_" + i).value;
        $("#show_weight_" + i).html(h * w);
        $("#point_list_" + i).val(h * w);
    }
}
</script>
<!-- End Javascript -->
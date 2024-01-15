<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("pengembalian/add");
$can_edit = ACL::is_allowed("pengembalian/edit");
$can_view = ACL::is_allowed("pengembalian/view");
$can_delete = ACL::is_allowed("pengembalian/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Pengembalian</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id_pengembalian']) ? urlencode($data['id_pengembalian']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-no_transaksi">
                                        <th class="title"> No Transaksi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_transaksi']; ?>" 
                                                data-pk="<?php echo $data['id_pengembalian'] ?>" 
                                                data-url="<?php print_link("pengembalian/editfield/" . urlencode($data['no_transaksi'])); ?>" 
                                                data-name="no_transaksi" 
                                                data-title="Enter No Transaksi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_transaksi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tgl_kembali">
                                        <th class="title"> Tgl Kembali: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['tgl_kembali']; ?>" 
                                                data-pk="<?php echo $data['id_pengembalian'] ?>" 
                                                data-url="<?php print_link("pengembalian/editfield/" . urlencode($data['no_transaksi'])); ?>" 
                                                data-name="tgl_kembali" 
                                                data-title="Enter Tgl Kembali" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tgl_kembali']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-id_petugas">
                                        <th class="title"> Id Petugas: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/pengembalian_id_petugas_option_list'); ?>' 
                                                data-value="<?php echo $data['id_petugas']; ?>" 
                                                data-pk="<?php echo $data['id_pengembalian'] ?>" 
                                                data-url="<?php print_link("pengembalian/editfield/" . urlencode($data['no_transaksi'])); ?>" 
                                                data-name="id_petugas" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['id_petugas']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-id_penyewa">
                                        <th class="title"> Id Penyewa: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/pengembalian_id_penyewa_option_list'); ?>' 
                                                data-value="<?php echo $data['id_penyewa']; ?>" 
                                                data-pk="<?php echo $data['id_pengembalian'] ?>" 
                                                data-url="<?php print_link("pengembalian/editfield/" . urlencode($data['no_transaksi'])); ?>" 
                                                data-name="id_penyewa" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['id_penyewa']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-no_pol">
                                        <th class="title"> No Pol: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/pengembalian_no_pol_option_list'); ?>' 
                                                data-value="<?php echo $data['no_pol']; ?>" 
                                                data-pk="<?php echo $data['id_pengembalian'] ?>" 
                                                data-url="<?php print_link("pengembalian/editfield/" . urlencode($data['no_transaksi'])); ?>" 
                                                data-name="no_pol" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_pol']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-id_denda">
                                        <th class="title"> Id Denda: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['id_denda']; ?>" 
                                                data-pk="<?php echo $data['id_pengembalian'] ?>" 
                                                data-url="<?php print_link("pengembalian/editfield/" . urlencode($data['no_transaksi'])); ?>" 
                                                data-name="id_denda" 
                                                data-title="Enter Id Denda" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['id_denda']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-harga">
                                        <th class="title"> Harga: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['harga']; ?>" 
                                                data-pk="<?php echo $data['id_pengembalian'] ?>" 
                                                data-url="<?php print_link("pengembalian/editfield/" . urlencode($data['no_transaksi'])); ?>" 
                                                data-name="harga" 
                                                data-title="Enter Harga" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['harga']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-id_pengembalian">
                                        <th class="title"> Id Pengembalian: </th>
                                        <td class="value"> <?php echo $data['id_pengembalian']; ?></td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> Export
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                            <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                            <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                </a>
                                                <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                    </a>
                                                    <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                    <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                        <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

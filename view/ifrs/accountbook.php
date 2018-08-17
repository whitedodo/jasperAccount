
<h2><?php echo $languagePack->getMessage('book', null, 'title'); ?></h2>
<h5>
  <a href="<?php echo $reportUrl; ?>">* <?php echo $languagePack->getMessage('book', null, 'url_report'); ?></a>
</h5>

<form id="writeFrm" name="bookeeping_frm_write" method="post" action="<?php echo $writeUrl; ?>">
<div id="writeFrm_View" style="display:none; border:solid #e6e6e6 1px;">
<h4 style="text-align:center;">
	<?php echo $languagePack->getMessage('book', null, 'write_title'); ?>
</h4>
<table class="tg_general" style="width:100%">
	<tr>	
		<th class="tg-031e" style="width:10%;">
			<?php echo $languagePack->getMessage('book', null, 'write_type'); ?>
		</th>
		<th class="tg-031e" style="width:15%;">
			<?php echo $languagePack->getMessage('book', null, 'write_category'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
			<?php echo $languagePack->getMessage('book', null, 'write_accountName'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
			<?php echo $languagePack->getMessage('book', null, 'write_account_no'); ?>
		</th>
		<th class="tg-031e">
			<?php echo $languagePack->getMessage('book', null, 'write_subject'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
			<?php echo $languagePack->getMessage('book', null, 'write_price'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
			<?php echo $languagePack->getMessage('book', null, 'write_count'); ?>
		</th>
		<th class="tg-031e" style="width:8%;">
			<?php echo $languagePack->getMessage('book', null, 'write_taxRate'); ?>
		</th>
	</tr>
  <tr>	
		<td class="tg-031e" style="width:5%;">
      <?php echo $accountFn->createMenu('type', NULL); ?>
		</td>
		<td class="tg-031e" style="width:7%;">
      <?php echo $accountFn->createMenu('category', NULL); ?>
		</td>
		<td class="tg-031e">
		  <input type="text" name="accountName" class="input_box" value="">
		</td>
		<td class="tg-031e">
		  <input type="text" name="accountNo" class="input_box" value="">
		</td>
		<td class="tg-031e">
		  <input type="text" name="subject" class="input_box" value="">
		</td>
		<td class="tg-031e">
		  <input type="text" name="price" class="input_box" value="">
		</td>
		<td class="tg-031e" style="width:7%;">
  		<input type="text" name="count" class="input_box" value="">
		</td>
		<td class="tg-031e" style="width:7%;">
  		<input type="text" name="taxRate" class="input_box" value="">
		</td>
	</tr>
	<tr>
		<td class="tg-031e" style="width:7%;">
			<?php echo $languagePack->getMessage('book', null, 'write_regidate'); ?>
		</td>
		<td class="tg-031e" colspan="6">
		<input name="regidate" class="datepicker-here"
		             data-timepicker="true" 
		             data-language="en"
		             data-date-format="yyyy-mm-dd"
		             data-time-format='hh:ii AA'>
		</td>
		<td class="tg-031e" style="width:8%;">
      <a href="javascript:jasper_update('<?php 
          echo "$boardName','$language','$startDate','$endDate" .
               "','$userName', 'write', 'w')"; ?>;" class="button" style="color:#000;">
        
			<?php echo $languagePack->getMessage('book', null, 'write_submit'); ?>
			</a>
        
    <!--  <input type="submit" name="submit" class="button" style="color:#000;" value="작성(Submit)">-->
		</td>
	</tr>
</table>
</div>
</form>

<!-- 글 출력-->
<!-- 헤더-->
<div id="viewFrm_View" style="display:block; border:solid #e6e6e6 1px;">
<h2 style="text-align:center;">
	<?php echo $languagePack->getMessage('book', null, 'read_title'); ?>
</h2>
<hr>
<table style="width:100%">
  <tr>
    <td style="width:25%;">
      <h4 style="text-align:center;"><?php echo $userName; ?></h4>    
    </td>
    <td>
      <h4 style="text-align:center;">
        <?php echo $startDate; ?>~
        <br>
        <?php echo $endDate; ?>
      </h4>
    </td>
    <td style="width:25%;">
      <h4 style="text-align:center;">
		<?php echo $languagePack->getMessage('book', null, 'read_unit'); ?>
		<?php echo $baseUnit;?>
      </h4>    
    </td>
  </tr>
</table>

<!-- 내용-->
<table class="tg_general" style="width:100%">
	<tr>	
		<th class="tg-031e">		
			<?php echo $languagePack->getMessage('book', null, 'read_subject'); ?>
		</th>
		<th class="tg-031e" style="width:30%;">
			<?php echo $languagePack->getMessage('book', null, 'read_balance'); ?>
		</th>
		<th class="tg-031e" style="width:20%;">
			<?php echo $languagePack->getMessage('book', null, 'read_remark'); ?>
		</th>
	</tr>
	<tr>	
		<td class="tg-031e"><?php echo $initialStartDate . "~" . $initialEndDate; ?>
			<?php echo $languagePack->getMessage('book', null, 'read_initial_balance'); ?>
		</td>
		<td class="tg-031e">
			<?php echo number_format($balance); ?>
		</td>
		<td class="tg-031e"></td>
	</tr>
</table>

<table class="tg_general" style="width:100%">
	<tr>	
		<th class="tg-031e" style="width:7%;" rowspan="2">
			<?php echo $languagePack->getMessage('book', null, 'read_header_id'); ?>
		</th>
		<th class="tg-031e" rowspan="2">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_item'); ?>
		</th>
		<th class="tg-031e" style="width:7%;" colspan="2">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_type'); ?>
		</th>
		<th class="tg-031e" style="width:7%;" colspan="2">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_category'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_accountName'); ?>
		</th>
		<th class="tg-031e" style="width:7%;" colspan="2">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_accountNo'); ?>
		</th>
	</tr>
	<tr>	
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_price'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_count'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_taxRate'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_tax'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_money'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_balance'); ?>
		</th>
		<th class="tg-031e" style="width:7%;">
		  	<?php echo $languagePack->getMessage('book', null, 'read_header_remark'); ?>
		</th>
	</tr>
</table>

<!-- Content 출력-->
<?php $jasper->listContent($boardName, $startDate, $endDate, $userName, $balance, $page_id); ?>

<!-- Pager -->
<div id="wrapper">
  <div id="content">
    <?php
      $jasper->pager( $boardName, $startDate, $endDate, $userName );
    ?>
    <br>
    <table style="width:100%">
      <tr>
        <td style="text-align:center;">
         
        </td>
      </tr>
      <tr>
        <td>
        	
        </td>
      </tr>
    </table>
  </div>
</div>

</div>


<!-- 글쓰기-->
<div>
  <table style="width:100%;">
    <tr>
      <td style="width:8%; text-align:left;">
        <a href="javascript:toggleLayer('writeFrm_View');">
          <p class="button" style="color:#000">
			<?php echo $languagePack->getMessage('book', null, 'func_write'); ?>
          </p>
        </a>
      </td>
      <td>
        <a href="javascript:toggleLayer('viewFrm_View');">
          <p class="button" style="color:#000">
          	<?php echo $languagePack->getMessage('book', null, 'func_view'); ?>
          </p>
        </a>
      </td>
    </tr>
  </table>
</div>
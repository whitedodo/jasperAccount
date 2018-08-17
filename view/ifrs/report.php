
<h2><?php echo $languagePack->getMessage('report', null, 'title'); ?></h2>
<h5>
  <a href="<?php echo $bookUrl; ?>">* <?php echo $languagePack->getMessage('report', null, 'url_book'); ?></a>
</h5>
<hr>
<h2 style="text-align:center;">
<?php echo $languagePack->getMessage('report', 'fstatement', 'h_title'); ?>
</h2>
<table style="width:100%">
  <tr>
    <td style="width:25%;">
      <h4 style="text-align:center;"><?php echo $userName; ?></h4>    
    </td>
    <td>
      <h4 style="text-align:center;"><?php echo $endDate; ?>
      &nbsp;<?php echo $languagePack->getMessage('report', 'fstatement', 'h_current'); ?>
      </h4>
    </td>
    <td style="width:25%;">
      <h4 style="text-align:center;">
      	<?php echo $languagePack->getMessage('report', 'fstatement', 'h_unit'); ?>
      	<?php echo $baseUnit;?>
      </h4>    
    </td>
  </tr>
</table>
<table class="tg_general" style="width:100%">
	<tr>	
		<th class="tg-031e" style="width:8%;">
			<?php echo $languagePack->getMessage('report', 'fstatement', 'h_subject'); ?>
		</th>
		<th class="tg-031e" style="width:8%;">
			<?php echo $languagePack->getMessage('report', 'fstatement', 'h_price'); ?>
		</th>
		<th class="tg-031e" style="width:8%;">
			<?php echo $languagePack->getMessage('report', 'fstatement', 'h_subject'); ?>
		</th>
		<th class="tg-031e" style="width:8%;">
			<?php echo $languagePack->getMessage('report', 'fstatement', 'h_price'); ?>
		</th>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#e2e2e2;" colspan="2">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_asset_title'); ?>
	    </span>
	  </td>
	  <td class="tg-031e" style="background-color:#81F7F3;" colspan="2">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_debt_title'); ?>
	    </span>
	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_cash'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_balance); ?></td>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_short'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_shortBorrowing); ?></td>
	</tr>
	<tr>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_land'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_land); ?></td>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_midlong'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_longBorrowing); ?></td>
	</tr>
	<tr>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_ar'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_ar); ?></td>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_bond'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_bondIssuance); ?></td>
	</tr>
	<tr>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_insurance'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_insurance); ?></td>
	  <td class="tg-031e" style="background-color:#81F7F3;">
    	  <span class="report_subject">
    	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_totalDebt'); ?>
    	  </span>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_sumOfDebt); ?></td>
	</tr>
	<tr>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_expendables'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_expendables); ?></td>
	  <td class="tg-031e" style="background-color:#81F7F3;">
	  	<span class="report_subject">
			<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_totalCapital'); ?>
		</span>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_sumOfCapital); ?></td>
	</tr>
	<tr>
	  <td class="tg-031e">
		<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_machinery'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_machinery); ?></td>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_c_notapplicable'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_n_capital ); ?>
	  </td>
	</tr>
	<tr>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_stock'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_stock); ?></td>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_c_equity'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_eq_capital); ?>
	</tr>
	
	<tr>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_notapplicable'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_l_applicable); ?></td>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_c_other'); ?>
	  </td>
	  <td class="tg-031e"><?php echo number_format($b_r_other_capital); ?>
	  </td>
	</tr>
	<tr>
	  <td class="tg-031e"></td>
	  <td class="tg-031e"></td>
	  <td class="tg-031e">
	  	<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_c_retainEarning'); ?>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($b_r_retain_capital); ?>
	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#e2e2e2;">
	  	<span class="report_subject">
	  		<?php echo $languagePack->getMessage('report', 'fstatement', 'b_l_totalAsset'); ?>
	  	</span>
  	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($b_l_totalOfAsset); ?>
	  </td>
	  <td class="tg-031e" style="background-color:#81F7F3;">
	  	<span class="report_subject">
	  		<?php echo $languagePack->getMessage('report', 'fstatement', 'b_r_c_totalCapitalDept'); ?>
	  	</span>
  	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($b_r_sumOfAsset); ?>
	  </td>
	</tr>
</table>
<br>
<br>
<br>
<!-- 손익계산서-->
<h2 style="text-align:center;">
	<?php echo $languagePack->getMessage('report', 'incomestatement', 'title'); ?>
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
        <br><br>
        	<?php echo $languagePack->getMessage('report', 'incomestatement', 'h_feature'); ?>
      </h4>
    </td>
    <td style="width:25%;">
      <h4 style="text-align:center;">
      	<?php echo $languagePack->getMessage('report', 'incomestatement', 'h_unit'); ?>
      	<?php echo $baseUnit;?>
      </h4>    
    </td>
  </tr>
</table>
<table class="tg_general" style="width:100%">
	<tr>	
		<th colspan="2" class="tg-031e">
		    <span class="report_subject">
			      <?php echo $languagePack->getMessage('report', 'incomestatement', 'category'); ?>
			  </span>
		</th>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#81F7F3;text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'sales_title'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e" style="width:25%">
 	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'sales_nonappliable'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_rev_none ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'sales_generalsale'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_rev_gene ); ?>
 	  </td>
	</tr>
  	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;
    		<?php echo $languagePack->getMessage('report', 'incomestatement', 'sales_interestRate'); ?>
		</span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_rev_interest ); ?>
 	  </td>
	</tr>
  	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;
    		<?php echo $languagePack->getMessage('report', 'incomestatement', 'sales_fdr'); ?>
		</span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_rev_disposalRevenue ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'sales_other'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_rev_other ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#81F7F3;text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'totalSales'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_rev_total ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outCost'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_totalCost ); ?>
 	  </td>
	</tr>
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outManufacturing'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_manufacturing ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outPurchase'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_purchase ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outSelling'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_sales ); ?>
 	  </td>
	</tr>
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	&nbsp;&nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'incomestatement', 'outShipping'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_ship ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	&nbsp;&nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'incomestatement', 'outAdv'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_adv ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	&nbsp;&nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'incomestatement', 'outRent'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_rent ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outMgt'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $management_cost ); ?>
 	  </td>
	</tr>
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outSalary'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_salary ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outConsumable'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_consumable ); ?>
 	  </td>
	</tr>
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outGas'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_gas ); ?>
 	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outElectric'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_electric ); ?>
 	  </td>
	</tr>
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outCommunication'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_communication ); ?>
 	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outConsumableInsurance'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_insurance ); ?>
 	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outInventory'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_inventory ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outFin'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_interest ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outDepreciation'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_depreciation ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outOtherCost'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_sumOfother ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'incomestatement', 'outOther'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_other ); ?>
 	  </td>
	</tr>
	<tr>
		  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'incomestatement', 'outCashDiv'); ?> 
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_cashdividend ); ?>
 	  </td>
	</tr>
	<tr>
		  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;
	    <?php echo $languagePack->getMessage('report', 'incomestatement', 'outLodFixtures'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_asset ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#81F7F3;text-align:left;">
	    <span class="report_subject">
	    <?php echo $languagePack->getMessage('report', 'incomestatement', 'outTotalCost'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_totalCost ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#81F7F3;text-align:left;">
	    <span class="report_subject">
	    <?php echo $languagePack->getMessage('report', 'incomestatement', 'outGovTax'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_govTax ); ?>
 	  </td>
	</tr>
	
	<tr>
	  <td class="tg-031e" style="background-color:#81F7F3;text-align:left;">
	    <span class="report_subject">
	    <?php echo $languagePack->getMessage('report', 'incomestatement', 'outLocalGovTax'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_localGovtax ); ?>
 	  </td>
	</tr>
	
	<tr>
	  <td class="tg-031e" style="background-color:#81F7F3;text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'incomestatement', 'outTotalTax'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_tax ); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#C8FE2E;text-align:left;">
	    <span class="report_subject">
	    <?php echo $languagePack->getMessage('report', 'incomestatement', 'outIncomeOutcome'); ?>
	    </span>
	  </td>
 	  <td class="tg-031e">
 	    <?php echo number_format( $pl_f_out_totalIncome ); ?>
 	  </td>
	</tr>
</table>
<br>
<br>
<br>
<!-- 현금흐름표-->
<h2 style="text-align:center;">
	   <?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_title'); ?><br>
	   <?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_indirect'); ?>
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
		<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_unit'); ?>
		<?php echo $baseUnit;?>
	  </h4>    
    </td>
  </tr>
</table>
<table class="tg_general" style="width:100%">
	<tr>	
	  <td class="tg-031e" style="background-color:#9FF781; text-align:left;" colspan="4">
	    <span class="report_subject">
			<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_operate_title'); ?>
		</span>
	  </td>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#C8FE2E;text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;
			<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_netIncomeOutcomewithoutTax'); ?>
		</span>
	  </td>
	  <td class="tg-031e" style="width:15%;">
	  </td>
	  <td class="tg-031e" style="width:15%;">
	    <?php echo number_format( $cash_f_income ); ?>
	  </td>
	  <td class="tg-031e" style="width:15%;">
	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#F3E2A9;" colspan="4">
	    <span class="report_subject">&nbsp;&nbsp;
	    <?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_cashwithoutflow'); ?>
	    </span>
	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_depreciation'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($cash_f_depreciation); ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_LoDFixture'); ?>
	   	</span>
	  </td>
	  <td class="tg-031e">
      	<?php echo number_format( $cash_f_disposalAsset ); ?>
	  </td>
	  <td class="tg-031e">
 	    <span>
      	<?php echo number_format( $cash_f_sumOfdisposalPlus ); ?>
      </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#F3E2A9;" colspan="4">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_revenuewithoutcashflow'); ?>
	    </span>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#FFF;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_rev_interest'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  <?php echo number_format($cash_f_rev_interest); ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#F3E2A9;" colspan="4">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_changeAssetDebtActivities'); ?>
	    </span>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_ar'); ?>
	    </span>
	  </td>
	  <td>
  	  <?php echo "(" . number_format($cash_f_ar) . ")"; ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_inventories'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
  	  <?php echo "(" . number_format($cash_f_stock) . ")"; ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_accPayable'); ?>
	    	</span>
	  </td>
	  <td class="tg-031e">
	    <span style="text-decoration: underline;">
	    <?php echo "(" . number_format($cash_f_debt) . ")"; ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	    <span style="text-decoration: underline;">
	    <?php echo "(" . number_format($cash_f_sumOfdebt) . ")"; ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#81F7F3;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_salesGeneCash'); ?>
	    </span>
	  </td>
	  <td>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($cash_f_totalSales); ?>
	  </td>
	  <td>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_interestPayment'); ?>
    	</span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	    <?php echo "(" . number_format($cash_f_out_interest) . ")"; ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_govTax'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
   	  <?php echo "(" . number_format( $cash_f_out_Govtax ) . ")"; ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_LocalGovTax'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
   	  <?php echo "(" . number_format( $cash_f_out_LocalGovtax ) . ")"; ?>
	  </td>
	  <td class="tg-031e">
      <?php echo number_format( $cash_f_totalIncome ); ?>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="background-color:#9FF781;text-align:left;" colspan="4">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_investmentActivityCashFlow'); ?>
	    </span>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#81F7F3;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_inflowfrominvestActivity'); ?>
	    </span>
	  </td>
	  <td>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_DisposalOfFixtures'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($cash_f_acqDisposalFacility); ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#81F7F3;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_addExpenseWithoutCash'); ?>
	    </span>
	  </td>
	  <td>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_acquiOfEquipment'); ?>
	    </span>
	  </td>
	  <td>
	  </td>
	  <td class="tg-031e">
 	    <?php echo "(" . number_format($cash_f_acqPurchaseCost) . ")"; ?>
	  </td>
	  <td>
	    <?php echo "(" . number_format($cash_f_InvestmentActivity) . ")"; ?>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="background-color:#9FF781;text-align:left;" colspan="4">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_financingActi'); ?>
	    </span>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#81F7F3;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_addOfExpensesWithoutCashoutflow'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_IssuanceOfBonds'); ?>
	   	</span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($cash_f_issuanceBond); ?>
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left; background-color:#81F7F3;">
	    <span class="report_subject">&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_IssuanceOfBonds'); ?>  
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="text-align:left;">
	    <span class="report_subject">&nbsp;&nbsp;&nbsp;&nbsp;
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_CashDiv'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	    <?php echo "(" . number_format($cash_f_acqDisposalFacility) . ")"; ?>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($cash_f_FinancialActivity); ?>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="background-color:#9FF781;text-align:left;">
	    <span class="report_subject">
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_CashAndCashEquip'); ?>
	    </span>
	  </td>
    <td class="tg-031e">
	  </td>
	  <td class="tg-031e">
	  </td>
    <td class="tg-031e">
  	  <?php echo number_format( $cash_f_totalAssets ); ?>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="background-color:#9FF781;text-align:left;">
	    <span class="report_subject">
	    (<?php echo $startDate; ?>)
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_BaseCashAndCashEquip'); ?>
	    </span>
	  </td>
	  <td>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td>
	    <?php echo number_format( $cash_f_totalBeforeAssets ); ?>
	  </td>
	</tr>	
	
	<tr>
	  <td class="tg-031e" style="background-color:#9FF781;text-align:left;">
	    <span class="report_subject">
	    	(<?php echo $endDate; ?>)
	    	<?php echo $languagePack->getMessage('report', 'pl_cash', 'pl_cash_f_LastCashAndCashEquip'); ?>
	    </span>
	  </td>
	  <td>
	  </td>
	  <td class="tg-031e">
	  </td>
	  <td>
	    <?php echo number_format( $cash_f_totalAfterAssets ); ?>
	  </td>
	</tr>	
</table>

<!-- 자본변동-->
<br>
<br>
<br>
<h2 style="text-align:center;">
	<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_title'); ?>
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
		<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_unit'); ?>
		<?php echo $baseUnit;?>
      </h4>    
    </td>
  </tr>
</table>
<table class="tg_general" style="width:100%">
	<tr>	
		<th class="tg-031e" style="width:25%;">
		</th>
		<th class="tg-031e" style="width:25%;">
		    <span class="report_subject">
				<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_h_capital'); ?>
			</span>
		</th>
		<th class="tg-031e" style="width:25%;">
		    <span class="report_subject">
			    <?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_h_retainEarning'); ?>
			</span>
		</th>
		<th class="tg-031e" style="width:25%;">
		    <span class="report_subject">
			    <?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_h_total'); ?>
			</span>
		</th>
	</tr>
	<tr>
	  <td class="tg-031e" style="background-color:#F6CED8;">
	    <span class="report_subject">
		  <?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_l_startDate'); ?>
	      (<?php echo $startDate; ?>)
	    </span>
	  </td>
	  <td class="tg-031e">
 	  </td>
	  <td class="tg-031e">
 	  </td>
	  <td class="tg-031e">
 	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e">
	    <span class="report_subject">
	      &nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_l_capitalNotApplicable'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_b_r_n_capital); ?>
 	  </td>
	  <td class="tg-031e">
 	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_b_r_n_capital); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e">
	    <span class="report_subject">
	      &nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_l_capitalEquity'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_b_r_eq_capital); ?>
 	  </td>
	  <td class="tg-031e">
 	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_b_r_eq_capital); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e">
	    <span class="report_subject">
	      &nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_l_capitalOther'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_b_r_other_capital); ?>
 	  </td>
	  <td class="tg-031e">
 	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_b_r_other_capital); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e">
	    <span class="report_subject">
	      &nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_l_pl_NetIncomeOutcome'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	  
 	  </td>
	  <td class="tg-031e">
  	  <?php echo number_format($chE_pl_netIncome); ?>
 	  </td>
	  <td class="tg-031e">
  	  <?php echo number_format($chE_pl_netIncome); ?>
 	  </td>
	</tr>
	<tr>
	  <td class="tg-031e">
	    <span class="report_subject">
	      &nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_l_pl_CashDividend'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
 	  </td>
	  <td class="tg-031e">
  	  <?php echo number_format($chE_pl_cashDivided); ?>
 	  </td>
	  <td class="tg-031e">
  	  <?php echo number_format($chE_pl_cashDivided); ?>
 	  </td>
	</tr>	
	<tr>
	  <td class="tg-031e" style="background-color:#F6CED8;">
	    <span class="report_subject">
	      &nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_f_endDateTitle'); ?>
	      (<?php echo $endDate; ?>)
	      &nbsp;&nbsp;<?php echo $languagePack->getMessage('report', 'changeInEquity', 'chE_f_totalTitle'); ?>
	    </span>
	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_result_capital); ?>
 	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_result_retain_capital); ?>
 	  </td>
	  <td class="tg-031e">
	    <?php echo number_format($chE_result_sumOfTotal); ?>
 	  </td>
	</tr>
</table>

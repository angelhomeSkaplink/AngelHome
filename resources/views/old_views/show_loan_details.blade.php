@extends('layouts.app')

@section('htmlheader_title')
    Loan Detail View
@endsection

@section('contentheader_title')
    Loan Detail View
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<style>
    @media print
    {
        body {font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important; font-size: 9px;}
        .table { font-size: 9px !important; border: none !important; }
    }
</style>
<div class="row">  
	<form action="{{action('LoanController@loan_forward')}}" method="post">       
		<div class="box-body" id="printableArea">
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Loan Detail View</h3>
					</div>
					<div class="box-body">                 
						<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="loan_transection_id" value="{{ $row->loan_transection_id }}" />
						</div>
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="loan_id" value="{{ $row->loan_type_id }}" />
						</div>
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="em_id" value="{{ $row->emp_id }}" />
						</div>					
						<?php	$employee = DB::table('employees')->where('emp_id', $row->emp_id)->first(); { ?>
						<div class="form-group has-feedback">
							Employee
							<input type="text" class="form-control" name="emp_id"
								value="{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}" readonly />
						</div>
						<?php } ?>
						<?php $leavetype = DB::table('loan_type')->where('loan_type_id', $row->loan_type_id)->first(); { ?>
						
						<div class="form-group has-feedback">
							Loan Type
							<input type="text" class="form-control" name="loan_type_id" id="loan_type_id" value="{{ $leavetype->loan_type }}" onkeyup='getLoan();' readonly />
						</div>
						<?php } ?>
						<div class="form-group has-feedback">
							Principal Amount
							<input type="text" class="form-control" name="loan_ammount" id="loan_ammount" value="{{ $row->loan_ammount }}" onkeyup='getLoan();' readonly />
						</div>
						<?php if($row->loan_type_id == 1){ ?>
						<script>
							function getLoan(){
								var loan_ammount = parseFloat(document.getElementById('loan_ammount').value); // Loan Amount							
								var no_of_instalment = parseFloat(document.getElementById('no_of_instalment').value);
								var emi = Math.floor(loan_ammount/no_of_instalment);
								document.getElementById('emi').value = emi;
								var emi_of_instalment = no_of_instalment-1;
								var f_installment = loan_ammount-(emi*emi_of_instalment);
								document.getElementById('f_installment').value = f_installment;
								var interest_persentage = parseFloat(document.getElementById('interest_persentage').value);
								var interest_amount = Math.floor(no_of_instalment*((no_of_instalment+1)/2)*(emi/12)*(interest_persentage/100));
								document.getElementById('interest_amount').value = interest_amount;
								var pricipal_ammount = interest_amount+loan_ammount;
								document.getElementById('pricipal_ammount').value = pricipal_ammount;
								var no_of_instalment_interest = interest_persentage = parseFloat(document.getElementById('no_of_instalment_interest').value);
								var no_of_instalment_interest_int = no_of_instalment_interest-1;
								var interest_emi = Math.floor(interest_amount/no_of_instalment_interest);
								var f_i_installment = interest_amount-(interest_emi*no_of_instalment_interest_int);
								document.getElementById('f_i_installment').value = f_i_installment;
								console.log(interest_emi);
								document.getElementById('interest_emi').value = interest_emi;
							}
						</script>
						<div class="form-group has-feedback">	
							No of Instalment
							<input type="text" class="form-control" name="no_of_instalment" id="no_of_instalment" value="" onkeyup='getLoan();' required pattern="[0-9]+" Title="Numeric Value Only" />
						</div>					
						<div class="form-group has-feedback">
							EMI
							<input type="text" class="form-control" name="emi" id="emi" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							First Installment
							<input type="text" class="form-control" name="f_installment" id="f_installment" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							Interest Persentage
							<input type="text" class="form-control" name="interest_persentage" id="interest_persentage" onkeyup='getLoan();' required pattern="[0-9.]+" Title="Numeric Value Only" />
						</div>
						<div class="form-group has-feedback">
							Interset Amount
							<input type="text" class="form-control" name="interest_amount" id="interest_amount" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							Total Loan Amount
							<input type="text" class="form-control" name="pricipal_ammount" id="pricipal_ammount" value="" readonly />
						</div>
						<div class="form-group has-feedback">	
							No of Instalment(Interest Amount)
							<input type="text" class="form-control" name="no_of_instalment_interest" id="no_of_instalment_interest" value="" onkeyup='getLoan();' required pattern="[0-9]+" Title="Numeric Value Only" />
						</div>
						<div class="form-group has-feedback">	
							First Installment(Interest Amount)
							<input type="text" class="form-control" name="f_i_installment" id="f_i_installment" value="" onkeyup='getLoan();' readonly />
						</div>
						<div class="form-group has-feedback">	
							EMI(Interest Amount)
							<input type="text" class="form-control" name="interest_emi" id="interest_emi" value="" onkeyup='getLoan();' readonly />
						</div>
						
						<?php } elseif($row->loan_type_id == 4){ ?>					
						<script>
							function getLoan(){		
								var loan_ammount = parseFloat(document.getElementById('loan_ammount').value); // Loan Amount							
								var no_of_instalment = parseFloat(document.getElementById('no_of_instalment').value);
								var emi = Math.floor(loan_ammount/no_of_instalment);
								var emi_of_instalment = no_of_instalment-1;
								var f_installment = loan_ammount-(emi*emi_of_instalment);
								console.log(loan_ammount);
								console.log(no_of_instalment);
								console.log(emi);	
								document.getElementById('f_installment').value = f_installment;
								document.getElementById('emi').value = emi;
								document.getElementById('pricipal_ammount').value = loan_ammount;
							}
						</script>				
						<div class="form-group has-feedback">
							Interest Persentage
							<input type="text" class="form-control" name="interest_persentage" id="interest_persentage" value="NILL" onkeyup='getLoan();' readonly />
						</div>
						<div class="form-group has-feedback">	
							No of Instalment
							<input type="text" class="form-control" name="no_of_instalment" id="no_of_instalment" value="" onkeyup='getLoan();' required pattern="[0-9]+" Title="Numeric Value Only" />
						</div>
						<div class="form-group has-feedback">
							First Installment
							<input type="text" class="form-control" name="f_installment" id="f_installment" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							EMI
							<input type="text" class="form-control" name="emi" id="emi" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							Interset Amount
							<input type="text" class="form-control" name="interest_amount" id="interest_amount" value="0" readonly />
						</div>
						<div class="form-group has-feedback">
							Total Loan Ammount
							<input type="text" class="form-control" name="pricipal_ammount" id="pricipal_ammount" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="no_of_instalment_interest" id="no_of_instalment_interest" value="0" />
						</div>
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="f_i_installment" id="f_i_installment" value="0" />
						</div>
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="interest_emi" id="interest_emi" value="0" />
						</div>
						<?php } elseif(($row->loan_type_id == 5)){ ?>
						<script>
							function getLoan(){		
								var loan_ammount = parseFloat(document.getElementById('loan_ammount').value); // Loan Amount							
								var no_of_instalment = parseFloat(document.getElementById('no_of_instalment').value);
								var emi = (loan_ammount/no_of_instalment).toFixed(2);							
								console.log(loan_ammount);
								console.log(no_of_instalment);
								console.log(emi);							
								document.getElementById('emi').value = emi;
								document.getElementById('pricipal_ammount').value = loan_ammount;
							}
						</script>	
						<div class="form-group has-feedback">
							Interest Persentage
							<input type="text" class="form-control" name="interest_persentage" id="interest_persentage" value="NILL" onkeyup='getLoan();' readonly />
						</div>
						<div class="form-group has-feedback">	
							No of Instalment
							<input type="text" class="form-control" name="no_of_instalment" id="no_of_instalment" value="" onkeyup='getLoan();' />
						</div>					
						<div class="form-group has-feedback">
							EMI
							<input type="text" class="form-control" name="emi" id="emi" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							Interset Amount
							<input type="text" class="form-control" name="interest_amount" id="interest_amount" value="0" readonly />
						</div>
						<div class="form-group has-feedback">
							Total Loan Ammount
							<input type="text" class="form-control" name="pricipal_ammount" id="pricipal_ammount" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="no_of_instalment_interest" id="no_of_instalment_interest" value="0" />
						</div>
						<div class="form-group has-feedback">
							<input type="hidden" class="form-control" name="interest_emi" id="interest_emi" value="0" />
						</div>
						<?php } else { ?>					
						<script>
							function getLoan(){		
								var loan_ammount = parseFloat(document.getElementById('loan_ammount').value);						
								var no_of_instalment = parseFloat(document.getElementById('no_of_instalment').value);
								var interest_annum = parseFloat(document.getElementById('interest_annum').value);
								var interest = interest_annum/100;
								var interest_month = interest/12;
								var top = Math.pow((1 + interest_month), no_of_instalment);
								var bottom = top - 1;
								var sp = top/bottom;
								var pricipal_ammount = (((loan_ammount * interest_month) * sp) * no_of_instalment).toFixed(2);
								var emi = (loan_ammount/no_of_instalment).toFixed(2);
								var interest_amount = pricipal_ammount - loan_ammount;							
								var no_of_instalment_interest = parseFloat(document.getElementById('no_of_instalment_interest').value);
								var interest_emi = interest_amount/no_of_instalment_interest;
								document.getElementById('emi').value = emi;
								document.getElementById('pricipal_ammount').value = pricipal_ammount;
								document.getElementById('interest_amount').value = interest_amount;
								document.getElementById('interest_emi').value = interest_emi;
							}
						</script>
						<div class="form-group has-feedback">
							Interest Persentage
							<input type="text" class="form-control" name="interest_annum" id="interest_annum" value="" onkeyup='getLoan();' />
						</div>
						<div class="form-group has-feedback">	
							No of Instalment(Principal Amount)
							<input type="text" class="form-control" name="no_of_instalment" id="no_of_instalment" value="" onkeyup='getLoan();'  />
						</div>					
						<div class="form-group has-feedback">
							EMI(Principal Amount)
							<input type="text" class="form-control" name="emi" id="emi" value="" readonly />
						</div>										
					</div>
				</div>
			</div> 
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group has-feedback">
							Interset Amount
							<input type="text" class="form-control" name="interest_amount" id="interest_amount" value="" readonly />
						</div>
						<div class="form-group has-feedback">
							Total Loan Ammount
							<input type="text" class="form-control" name="pricipal_ammount" id="pricipal_ammount" value=""  />
						</div>
						<div class="form-group has-feedback">	
							No of Instalment(Interest Amount)
							<input type="text" class="form-control" name="no_of_instalment_interest" id="no_of_instalment_interest" value="" onkeyup='getLoan();' required pattern="[0-9]+" Title="Numeric Value Only" />
						</div>
						<div class="form-group has-feedback">	
							EMI(Interest Amount)
							<input type="text" class="form-control" name="interest_emi" id="interest_emi" value="" onkeyup='getLoan();' readonly />
						</div>
						<?php } ?>				
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group has-feedback">
							Applied On
							<input type="date" class="form-control" name="applied_on" value="{{ $row->applied_on }}" readonly />
						</div>
						<div class="form-group has-feedback">
							Applied For
							<input type="text" class="form-control" name="applied_for" value="{{ $row->applied_for }}" readonly />
						</div>
						<div class="form-group has-feedback">						
							<input type="hidden" class="form-control" name="status" value="2" readonly />
						</div>					
						<div class="form-group has-feedback">
							Forwarded By
							<input type="text" class="form-control" name="forwarded_by" value="{{ $row->forwarded_by }}" required pattern="[A-Za-z]+" Title="Alphabate character Only" />
						</div>	
						<div class="form-group has-feedback">
							Forwarded On
							<input type="text" class="form-control" name="forwarded_on" id="forwarded_on" value="{{ $row->forwarded_on }}"  />
							<script type="text/javascript"> $('#forwarded_on').datepicker({format: 'yyyy/mm/dd'});</script>
						</div>					
						<div class="form-group has-feedback">
							Remarks
							<input type="text" class="form-control" name="remarks" value="{{ $row->remarks}}"  />
						</div>
						<?php if($row->status == 1){ ?>
						<div class="row">                    
							<div class="col-xs-12">
								<button type="submit" class="btn btn-primary btn-block btn-flat">Forward To Secretary</button>
							</div>
						</div>
						<?php } else{ ?>
						<a href="#" class="btn btn-primary btn-block btn-flat">Forwarded To Secretary</a>
						<?php } ?>
						<div class="col-md-2" style="margin-top:20px;"><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="PRINT" /></div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
function printDiv(printpage)
{
    var headstr = "<html><head><title>Arrear List as on </title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return false;
}
</script>
@endsection
@section('scripts-extra')

@endsection
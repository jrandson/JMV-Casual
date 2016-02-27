

<div class="main_container">

	<!-- page content -->
	<div class="right_col" role="main">

		<div class="">

			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">


						<div class="x_content">

							<?php
							/* @var $this SiteController */
							/* @var $error array */

							$this->pageTitle=Yii::app()->name . ' - Error';
							$this->breadcrumbs=array(
								'Error',
							);
							?>

							<h2>Error <?php echo $code; ?></h2>

							<div class="error">
								<?php echo CHtml::encode($message); ?>
							</div>


						</div>

					</div>

				</div>
			</div>
		</div>


	</div>
	<!-- /page content -->
</div>



<?php
/**
 * @package InsightCustom
 */
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<!-- ********** Homepage Hero Section Start ********** -->
		<section id="homeHero">
			<div class="mediumHero">
				<div class="fullWidth heroHeadingContainer">
					<div class="heroHeadingWrapper flex-container">
						<div class="col50"></div>
						<div class="col50">
							<div class="heroHeading">
								<div class="whiteText textBlock">
								</div>
								<div class="btnContainer">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ********** Homepage Hero Section End ********** -->
		<section id="pageContent">
			<!-- ********** Intro Section Start ********** -->
			<section id ="whyLamers" class="paddedSection">
				<div class="fullWidth">
					<?php the_field('why_lamers_heading'); ?>
					<div class="pageWidth flex-container">
						<div class="col30">
							<div class="blockText">
								<h3 class="redText smallMargin"><?php the_field('reason_1'); ?></h3>
								<p><?php the_field('reason_1_description'); ?></p>
							</div>
						</div>
						<div class="col30">
							<div class="blockText">
								<h3 class="redText smallMargin"><?php the_field('reason_2'); ?></h3>
								<p><?php the_field('reason_2_description'); ?></p>
							</div>
						</div>
						<div class="col30">
							<div class="blockText">
								<h3 class="redText smallMargin"><?php the_field('reason_3'); ?></h3>
								<p><?php the_field('reason_3_description'); ?></p>
							</div>
						</div>
					</div>
					<div class="pageWidth centerButton">
						<a class="redButton" href="/about"><?php the_field('why_lamers_button_text'); ?></a>
					</div>
				</div>
			</section>
			<!-- ********** Intro Section End ********** -->
		</section>
	</main>
</div>
<?php
get_footer();

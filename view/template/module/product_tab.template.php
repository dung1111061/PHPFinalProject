<!-- 

parameters:
	productId
	productRank
	description
	reviews
 -->
<?php 


$number = count($reviews);
// Thống kê lượt xếp hạng
// $statisticalQuantity = array();
// foreach ($reviews as $review) {
// 	$group = $review[db_rank_review];
// 	$statisticalQuantity[$group]["number"]++;
// }


?>
	<div id="product-tab" data-product="<?= $productId ?>">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
								<li><a data-toggle="tab" href="#tab2">Thông số kĩ thuật</a></li>
								<li><a data-toggle="tab" href="#tab3">Bài review (<?= $number ?>)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?=$description?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
							<div class="product-options">
								<div class="col-md-3">
									<div class="parameter-product">
										Kích cỡ:
									</div>
									<div class="parameter-product">
										Màu sắc:
									</div>

								</div>

							</div>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span><?= $productRank ?></span>
													<div class="rating-stars" data-rank=<?= $productRank ?> >
									<i class="fa"></i>
									<i class="fa"></i>
									<i class="fa"></i>
									<i class="fa"></i>
									<i class="fa"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>

													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>

													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>

													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>

													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
<?php 
	foreach ($reviews as $review) {
		$name = $review[db_review_name];
		$email = $review[db_review_email];
		$rating = $review[db_review_rank];
		$description = $review[db_review_description];
		$date = $review['created_at'];
	
?>
													<li>
														<div class="review-heading">
															<h5 class="name"><?= $name ?></h5>
															<p class="date"><?= $date ?></p>
															<div class="review-rating" data-rank= <?= $rating ?> >
														<i class="fa"></i>
														<i class="fa"></i>
														<i class="fa"></i>
														<i class="fa"></i>
														<i class="fa"></i>
															</div>
														</div>
														<div class="review-body">
															<p><?= $description ?></p>
														</div>
													</li>
<?php 
	}
?>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Your Name" name="name">
													<input class="input" type="email" placeholder="Your Email" name="email">
													<textarea class="input" placeholder="Your Review" name="description"></textarea>
													<div class="input-rating">
														<span>Đánh giá: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn" type="button">Gửi</button>
												</form>
												
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
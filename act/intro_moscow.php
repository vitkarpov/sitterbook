<div id="boxes<?php echo $id_city; ?>" class="boxes-all">
	<div id="dialog<?php echo $id_city; ?>" class="dialog-all window">
		<a href="javascript:void(0)" class="link close">X</a>

		<div class="wrapper mapped">
			<p class="title-info-vacansy title-info-vacansy2">
				Выберите желаемое/возможное<br>
				территориальное расположение места работы
			</p>

			<div class="clear"></div>

			<div class="citys citys2 citys3">
				<div class="work">
					<div class="block-sel block-sel2">
						<p>
							Выберите районы<br>
							<?php echo $city_name;?>
						</p>

						<div class="wrap-check">
							<!-- Форма карты -->
							<div class="wrap-check vao-city">
								<!-- Выводим сюда карту-->
								<div class="parent-check">
									<p>
										<label class="label-wraper">
											<input type="checkbox" name="all-checkbox" value="checkbox">
											<span class="checkbox_box"></span>
											<span class="lab">Все</span>
										</label>
									</p>
								</div>
							</div>

							<button class="btn-rounded do-close">Ок</button>
						</div>
					</div>
				</div>
			</div>

			<div class="right-map right-map2">
				<div class="bl">
					<p>
						<a href="#">Округа и районы / <?php echo $city_name;?></a>
					</p>

					<p class="ya">
						<a href="#">Сориентируйся на карте</a>
					</p>
				</div>

				<div class="marginMap" id="<?php echo $map; ?>"></div>
			</div>
		</div>
	</div>
</div>
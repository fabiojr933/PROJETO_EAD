
<div class="caixa">
				<h2 class="titulo"><span class="case"><i class="ico curso"></i>Formação Front-end</span> Módulo 01 <i class="seta"></i> Capitulo 01 <i class="seta"></i> Aula 01</h2>
			</div>
			<div class="base-home">
			<div class="rows base-cursos ver_videos py-3">
				<div class="col-9 d-flex">
						<div class="caixa">
							<span class="titulo2"><?php echo $aula["aula"] ?></span>
							<div class="caixa-video">
								<div class="caixa-embed">
									<iframe src="https://www.youtube.com/embed/<?php echo $aula["embed_youtube"] ?>" class="embed-item" width="655" height="360" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
								<div class="controles">
									<a href="" class="btn anterior">Anterior</a>
									<a href="" class="btn proximo">Próximo</a>  
								</div>
							</div>
						</div>
							
				</div>
				<div class="col-3 d-flex">	
					<div class="caixa">					
					<div class="menu-sidebar">		
						<span class="titulo2">Lista de aulas</span>
						<div class="scroll-lista">
							<ul>	
							<?php foreach($aulas as $aula_curso) { 
								$assistido = ($aula_curso["assistido"]) ? "marcado" : "naomarcado";								
								?>			
								<li class="<?php echo $assistido ?>">
									<a href="<?php echo URL_BASE ."aula/assistir/"  .$aula_curso["id_aula"]?>">
										<?php echo $aula_curso["aula"] ?>	
									</a>
								</li>	
							<?php } ?>		
								</ul>
						</div>
					</div>	
					</div>	
				</div>
			</div>
			<div class="rows base-cursos ver_videos pb-3">
				<div class="col-9 mb-3">
				<?php if($baixar){   ?>
					<div class="v-downloads">
					<div class="caixa">
						<span class="titulo2">ARQUIVOS DISPONÍVEÍS PARA DOWNLOADS</span>						
							<ul>
							<?php foreach($baixar as $bxa)  {  ?>
								<li><a href="<?php echo URL_BASE ."Baixar/" .$bxa["path"] ?>" class="icon" target="_blank"><?php echo $bxa["titulo_download"] ?></a></li>		
								<?php } ?>
							</ul>
					</div>
				</div>

				<?php if($comentarios) { ?>
				<div class="caixa">
				<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Comentários</span> Perguntas e resposta da plataforma</h2>
			</div>
		
				<div class="rows duvidas py-3">
					<div class="col-12">
						<div class="caixa">
							<ul>
							<li>
							<?php foreach($comentarios as $co) {  ?>
								<img src="<?php echo URL_BASE ?>assets/img/ico-comentarios.png">
								<span class="titulo"><?php echo $co["comentario"] ?> </span>

								<span class="tt1">Aula: aprendendo pensar como programador</span>
								<div class="resposta">
									<span class="titulo">Resposta <small>Data:08/07/2018</small></span>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tellus ante, iaculis sed nulla consequat, interdum posuere arcu. Suspendisse pellentesque, augue vitae cursus cursus, tellus purus hendrerit elit, quis malesuada est nunc ac diam. </p>
								</div>	
								<?php }  ?>		
							</li>		
										
							</ul>
						</div>
					</div>
					
				</div>  					
				<?php } ?>

				<?php } ?>
				<form action="<?php echo URL_BASE."Comentario/inserir" ?>" name="comentario2" method="POST">
					<div class="base-comentario">
						<div class="caixa">	
							<span class="titulo2">Comentários </span>					

							<textarea rows="10" placeholder="Deixe seu comentrio" name="comentario"></textarea>	
							<input type="hidden" name="id_aula" value="<?php echo $aula["id_aula"] ?>"/>
							<input type="hidden" name="id_curso" value="<?php echo $aula["id_curso"] ?>"/>
							<input type="submit" name="" value="Comentário" class="btn">
							
											
						</div>
					</div>
					</form>
				</div>
				<div class="col-3">	
					<div class="v-desempenho">						
					<div class="caixa">	
						<span class="titulo2">Seus acessos no curso</span>					
						<ul>
							<li>
								<i class="ico acesso"></i>
								<span class="tt1">ÚLTIMO CESSO</span>
								<span class="tt2">20/06/17</span>
							</li>
							<li>
								<i class="ico horas"></i>
								<span class="tt1">Duração</span>
								<span class="tt2">05h00min  </span>
							</li>
							<li>
								<i class="ico aula"></i>
								<span class="tt1">Total de Aulas</span>
								<span class="tt2">27 aulas </span>
							</li>
							
							<li>
								<i class="ico aula-ass"></i>
								<span class="tt1">Aulas assistidas</span>
								<span class="tt2">27 aulas </span>
							</li>
							
							
						</ul>
				</div>
				</div>
				
				</div>
			</div>				
			</div>
		
				
		</div>
                    
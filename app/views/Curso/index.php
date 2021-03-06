<div class="caixa">
			<h2 class="titulo"><span class="case"><i class="ico duvida"></i>Curso</span> Curso de Front-end</h2>
		</div>
		
			<div class="base-home">
				<div class="rows base-cursos py-3">
				<div class="col-9">
						<div class="caixa">
							<div class="base-caixa-curso rows">
								<div class="col-4">
									<div class="thumb"><img src="<?php echo URL_BASE ."assets/img/" .$curso["imagem"] ?>"></div>
								</div>
								<div class="col-8">
									<span class="titulo"><?php echo $curso["curso"] ?></span>
									<ul>
										<li><i class="ico data"></i><small>DATA DE INÍCIO:</small> <span>27/06/2017</span></li>
										<li><i class="ico hora"></i><small>Duração:</small> <span><?php echo $curso["duracao"] ?></span></li>
										<li><i class="ico qtd"></i><small>Quantidade:</small> <span><?php echo $qtde_aula ?></span></li>
									</ul>
									<div class="progress">
										<small>Nível de progressão deste curso <b><?php echo number_format(($qtde_assistida["QTDE"] / $qtde_aula) * 100,2)?></b></small>
										<progress value="<?php echo $qtde_assistida["QTDE"] ?>" max="<?php echo $qtde_aula ?>"></progress>
									</div>
								</div>	
							</div>
							</div>
							
						
						
						<div class="lista">
						<div class="caixa">
						<span class="titulo2">Lista de aulas</span>
							<table cellpadding="0" cellspacing="0" border="0">
								<thead>
									<tr>
										<th align="left">Titulo</th>
										<th align="left">Duração</th>
										<th align="left">Data</th>
										<th align="left">Assistido</th>
										<th align="left">tipo</th>
									</tr>
								</thead>								
								<tbody>	
								<?php foreach ($aulas as $aula) {
												$assistido = ($aula["assistido"]) ? "iassistido" : "inaoassistido";	
												$simnao = ($aula["assistido"]) ? "Sim" : "Não"; 										

													 ?>					 
									<tr>
										<td align="left"><a href="<?php echo URL_BASE ."Aula/assistir/" .$aula["id_aula"] ?>"><i class="ico ititulo"></i><?php echo $aula["aula"]?></a></td>
										<td align="left"><i class="ico iduracao"></i><?php echo $aula["duracao_aula"] ?></td>
										<td align="left"><i class="ico idata"></i><?php echo $aula["data"] ?></td>
										<td align="left"><i class="ico <?php echo $assistido ?>"></i><?php echo $simnao ?></td>
										<td align="left"><i class="ico iaula"></i>Aula</td>
									</tr>	
									<?php } ?>	
								</tbody>								
							</table>
						</div>
						</div>
					</div>
				<!--sidebar-->
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
								<span class="tt2"><?php echo  $qtde_aula?></span>
							</li>
							
							<li>
								<i class="ico aula-ass"></i>
								<span class="tt1">Aulas assistidas</span>
								<span class="tt2"><?php echo $qtde_assistida["QTDE"] ?></span>
							</li>
							
							
						</ul>
				</div>
				</div>
				
				</div>
			</div>
		
		
		</div>
                    
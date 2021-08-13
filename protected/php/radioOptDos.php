<?php 

										// RESPUESTAS
										$radioOpt = array('Siempre','Casi siempre','Algunas veces','Casi nunca','Nunca');

										// CONTADOR DE RESPUESTAS
										$contRadioOpt = count($radioOpt);

										// VALOR DEL RADIOBUTTOM
										$valRadOpt = 0; 

										for ($i=0; $i < $contRadioOpt; $i++) {				
											$valRadOptDos = $valRadOpt; 
											echo '

											<div class="form-check form-check-inline mx-1 mb-3">
												<input class="option-input radio" type="radio" name="opt'.$numPregunta.'" value="'.$valRadOptDos.'" required>
									 			<label class="form-check-label lvdeTexto">'.$radioOpt[$i].'</label>
									 		</div>

											';
											// VALOR DESCENDENTE
											$valRadOptDos = $valRadOpt++;
										}


 ?>
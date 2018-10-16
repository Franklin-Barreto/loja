
<tr>
	<td>Nome</td>
	<td><input class="form-control" type="text" name="nome"
		value="<?=$produto->nome?>" /></td>
</tr>
<tr>
	<td>Preço</td>
	<td><input class="form-control" type="number" name="preco"
		value="<?=$produto->preco?>" /></td>
</tr>
<tr>
	<td>Descrição</td>
	<td><textarea class="form-control" name="descricao"><?=$produto->descricao?></textarea></td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="usado" <?=$produto->usado?>
		value="true"> Usado

</tr>
<tr>
	<td>Categoria</td>
	<td><select class="form-control" name="categoria_id">
                    <?php

                    foreach ($categorias as $categoria) :
                        $essaEhACategoria = $produto->categoria_id == $categoria->id;
                        $selecao = $essaEhACategoria ? "selected='selected'" : "";
                        ?>
                        <option value="<?=$categoria->id?>"
				<?=$selecao?>>
                            <?=$categoria->nome?>
                        </option>
                    <?php endforeach ?>
                </select></td>
</tr>
<tr>
<tr>
	<td>Tipo do produto</td>
	<td><select name="tipoProduto" class="form-control">
            <?php
            $tipos = array(
                "Produto",
                "Livro Fisico",
                "Ebook"
            );
            foreach ($tipos as $tipo) :
                $tipoSemEspaco = str_replace(' ', '', $tipo);
                $esseEhOTipo = get_class($produto) == $tipoSemEspaco;
                $selecaoTipo = $esseEhOTipo ? "selected='selected'" : "";
                ?>
                <?php if ($tipo == "Livro Fisico") : ?>
                    <optgroup label="Livros">
                <?php endif ?>
                        <option value="<?=$tipoSemEspaco?>"
					<?=$selecaoTipo?>>
                            <?=$tipo?>
                        </option>
                <?php if ($tipo == "Ebook") : ?>
                    </optgroup>
                <?php endif ?>
            <?php endforeach ?>
        </select></td>
</tr>
<tr>
	<td>ISBN (caso seja um Livro)</td>
	<td><input type="text" name="isbn" class="form-control"
		value="<?=$produto->isbn ?>"></td>
</tr>
<tr>
	<td>WaterMark (caso seja um Ebook)</td>
	<td><input type="text" class="form-control" name="waterMark"
		value="<?=$produto->wWaterMark?>" />
	</td>
</tr>
<tr>
	<td>Taxa de Impressão (caso seja um Livro Físico)</td>
	<td><input type="text" class="form-control" name="taxaImpressao"
		value="<?=$produto->taxaImpressao?>" />
	</td>
</tr>

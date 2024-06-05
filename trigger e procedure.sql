use farmacia;
DELIMITER //

CREATE TRIGGER atualiza_estoque
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
    DECLARE qtde_estoque INT;

    -- Obtém a quantidade atual no estoque
    SET qtde_estoque = (SELECT qtde FROM estoque WHERE idEstoque = NEW.Estoque_idEstoque);

    -- Verifica se a quantidade no estoque é suficiente para a venda
    IF qtde_estoque >= NEW.qtde THEN
        -- Se a quantidade no estoque for suficiente, atualiza a quantidade
        UPDATE estoque 
        SET qtde = qtde_estoque - NEW.qtde
        WHERE idEstoque = NEW.Estoque_idEstoque;
    ELSE
        -- Se a quantidade no estoque não for suficiente, pode lançar um erro ou tomar outra ação
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Quantidade no estoque insuficiente para a venda';
    END IF;
END;
//

trigger de nota fiscal e atualiza estoque:

DELIMITER $$

CREATE TRIGGER gerarNotaFiscal
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
    INSERT INTO nota_fiscal (idVenda)
    VALUES (NEW.idVenda);
END$$

DELIMITER ;

DELIMITER //

CREATE PROCEDURE cadastraCompraEstoque (
    IN p_dt_compra DATE,
    IN p_Fornecedor_cnpj VARCHAR(200),
    IN p_items JSON
)
BEGIN
    DECLARE v_idCompra INT;
    DECLARE v_Produto_idProduto INT;
    DECLARE v_qtde INT;
    DECLARE v_item INT DEFAULT 0;
    DECLARE v_nome_produto VARCHAR(255);
    DECLARE v_item_qtde INT;

    -- Insere a nova compra na tabela Compra_produtos
    INSERT INTO Compra_produtos (dt_compra, Fornecedor_cnpj)
    VALUES (p_dt_compra, p_Fornecedor_cnpj);

    -- Obtém o ID da compra recém-inserida
    SET v_idCompra = LAST_INSERT_ID();

    -- Itera sobre os itens no JSON
    WHILE v_item < JSON_LENGTH(p_items) DO
        SET v_nome_produto = JSON_UNQUOTE(JSON_EXTRACT(p_items, CONCAT('$[', v_item, '].nome_produto')));
        SET v_item_qtde = JSON_UNQUOTE(JSON_EXTRACT(p_items, CONCAT('$[', v_item, '].qtde')));

        -- Insere o item na tabela Item_compra
        INSERT INTO Item_compra (qtde, nome_produto, Compra_produtos_idCompra)
        VALUES (v_item_qtde, v_nome_produto, v_idCompra);

        -- Verifica se o produto já está no estoque
        SELECT Produto_idProduto, qtde
        INTO v_Produto_idProduto, v_qtde
        FROM Estoque
        WHERE Produto_idProduto = (SELECT idProduto FROM Produto WHERE nome = v_nome_produto)
        LIMIT 1;

        -- Se o produto já estiver no estoque, atualiza a quantidade
        IF v_Produto_idProduto IS NOT NULL THEN
            UPDATE Estoque
            SET qtde = qtde + v_item_qtde
            WHERE Produto_idProduto = v_Produto_idProduto;
        ELSE
            -- Caso contrário, cadastra o novo produto no estoque
            INSERT INTO Estoque (qtde, Produto_idProduto, Compra_produtos_idCompra)
            VALUES (v_item_qtde, (SELECT idProduto FROM Produto WHERE nome = v_nome_produto), v_idCompra);
        END IF;

        -- Passa para o próximo item
        SET v_item = v_item + 1;
    END WHILE;
END//

DELIMITER ;
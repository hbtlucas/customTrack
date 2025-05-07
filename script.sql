-- Populando a tabela clientes (15 registros)
INSERT INTO clientes (nome_cliente, telefone, email, cpf) VALUES
('Ana Silva', '(11) 98765-4321', 'ana.silva@email.com', '123.456.789-01'),
('Bruno Oliveira', '(21) 97654-3210', 'bruno.oliveira@email.com', '234.567.890-12'),
('Carla Souza', '(31) 96543-2109', 'carla.souza@email.com', '345.678.901-23'),
('Diego Santos', '(41) 95432-1098', 'diego.santos@email.com', '456.789.012-34'),
('Elisa Costa', '(51) 94321-0987', 'elisa.costa@email.com', '567.890.123-45'),
('Felipe Lima', '(61) 93210-9876', 'felipe.lima@email.com', '678.901.234-56'),
('Gabriela Almeida', '(71) 92109-8765', 'gabriela.almeida@email.com', '789.012.345-67'),
('Hugo Pereira', '(81) 91098-7654', 'hugo.pereira@email.com', '890.123.456-78'),
('Isabela Ferreira', '(91) 90987-6543', 'isabela.ferreira@email.com', '901.234.567-89'),
('João Mendes', '(12) 99876-5432', 'joao.mendes@email.com', '012.345.678-90'),
('Kelly Ribeiro', '(22) 98765-4321', 'kelly.ribeiro@email.com', '123.456.789-00'),
('Lucas Barbosa', '(32) 97654-3210', 'lucas.barbosa@email.com', '234.567.890-11'),
('Marina Gomes', '(42) 96543-2109', 'marina.gomes@email.com', '345.678.901-22'),
('Nataniel Rocha', '(52) 95432-1098', 'nataniel.rocha@email.com', '456.789.012-33'),
('Olivia Duarte', '(62) 94321-0987', 'olivia.duarte@email.com', '567.890.123-44');

-- Populando a tabela produtos (15 registros)
INSERT INTO produtos (nome_produto, valor_produto, categoria) VALUES
('Camiseta Básica', '29.90', 'Roupas'),
('Calça Jeans', '89.90', 'Roupas'),
('Tênis Esportivo', '149.90', 'Calçados'),
('Mochila Escolar', '79.90', 'Acessórios'),
('Relógio Analógico', '99.90', 'Acessórios'),
('Boné Estilizado', '39.90', 'Acessórios'),
('Jaqueta de Couro', '199.90', 'Roupas'),
('Óculos de Sol', '59.90', 'Acessórios'),
('Cinto de Couro', '49.90', 'Acessórios'),
('Vestido Floral', '79.90', 'Roupas'),
('Sapato Social', '129.90', 'Calçados'),
('Bolsa de Ombro', '69.90', 'Acessórios'),
('Camisa Polo', '59.90', 'Roupas'),
('Shorts Esportivo', '39.90', 'Roupas'),
('Sandália Casual', '49.90', 'Calçados');

-- Populando a tabela relatorios (15 registros)
INSERT INTO relatorios (titulo, cliente, texto, created_at, updated_at) VALUES
('Relatório de Vendas Janeiro', 'Ana Silva', 'Análise de vendas do mês de janeiro.', '2025-01-10 10:00:00', '2025-01-10 10:00:00'),
('Feedback de Produto', 'Bruno Oliveira', 'Comentários sobre a qualidade dos produtos.', '2025-01-15 14:30:00', '2025-01-15 14:30:00'),
('Análise de Pedidos', 'Carla Souza', 'Resumo dos pedidos realizados no último trimestre.', '2025-01-20 09:00:00', '2025-01-20 09:00:00'),
('Relatório de Estoque', 'Diego Santos', 'Controle de estoque atualizado.', '2025-02-01 11:00:00', '2025-02-01 11:00:00'),
('Satisfação do Cliente', 'Elisa Costa', 'Pesquisa de satisfação com clientes.', '2025-02-05 15:00:00', '2025-02-05 15:00:00'),
('Relatório Financeiro', 'Felipe Lima', 'Balanço financeiro do primeiro trimestre.', '2025-02-10 08:00:00', '2025-02-10 08:00:00'),
('Tendências de Mercado', 'Gabriela Almeida', 'Análise de tendências para o setor de moda.', '2025-02-15 13:00:00', '2025-02-15 13:00:00'),
('Relatório de Devoluções', 'Hugo Pereira', 'Resumo das devoluções do último mês.', '2025-02-20 16:00:00', '2025-02-20 16:00:00'),
('Planejamento de Campanhas', 'Isabela Ferreira', 'Estratégias para campanhas de marketing.', '2025-03-01 10:00:00', '2025-03-01 10:00:00'),
('Relatório de Logística', 'João Mendes', 'Análise de desempenho da logística.', '2025-03-05 12:00:00', '2025-03-05 12:00:00'),
('Relatório de Atendimento', 'Kelly Ribeiro', 'Avaliação do suporte ao cliente.', '2025-03-10 14:00:00', '2025-03-10 14:00:00'),
('Análise de Concorrência', 'Lucas Barbosa', 'Estudo sobre concorrentes no mercado.', '2025-03-15 09:00:00', '2025-03-15 09:00:00'),
('Relatório de Promoções', 'Marina Gomes', 'Resultados das promoções realizadas.', '2025-03-20 11:00:00', '2025-03-20 11:00:00'),
('Relatório de Qualidade', 'Nataniel Rocha', 'Controle de qualidade dos produtos.', '2025-03-25 15:00:00', '2025-03-25 15:00:00'),
('Plano de Expansão', 'Olivia Duarte', 'Estratégias para expansão da loja.', '2025-03-30 08:00:00', '2025-03-30 08:00:00');

-- Populando a tabela pedidos (15 registros)
-- Nota: id_forma_pagamento assume valores 1, 2, 3 (ex.: 1=Cartão, 2=Boleto, 3=Pix). Crie a tabela formas_pagamento se necessário.
INSERT INTO pedidos (id_cliente, id_produto, id_forma_pagamento, valor_pedido, quantidade, status_pedido, status_pagamento) VALUES
(1, 1, 1, '29.90', '1', 'Confirmado', 'Pago'),
(2, 2, 2, '179.80', '2', 'Pendente', 'Aguardando'),
(3, 3, 3, '149.90', '1', 'Enviado', 'Pago'),
(4, 4, 1, '239.70', '3', 'Confirmado', 'Pago'),
(5, 5, 2, '99.90', '1', 'Pendente', 'Aguardando'),
(6, 6, 3, '79.80', '2', 'Entregue', 'Pago'),
(7, 7, 1, '199.90', '1', 'Confirmado', 'Pago'),
(8, 8, 2, '119.80', '2', 'Pendente', 'Aguardando'),
(9, 9, 3, '49.90', '1', 'Enviado', 'Pago'),
(10, 10, 1, '159.80', '2', 'Confirmado', 'Pago'),
(11, 11, 2, '129.90', '1', 'Pendente', 'Aguardando'),
(12, 12, 3, '209.70', '3', 'Entregue', 'Pago'),
(13, 13, 1, '59.90', '1', 'Confirmado', 'Pago'),
(14, 14, 2, '79.80', '2', 'Pendente', 'Aguardando'),
(15, 15, 3, '49.90', '1', 'Enviado', 'Pago');

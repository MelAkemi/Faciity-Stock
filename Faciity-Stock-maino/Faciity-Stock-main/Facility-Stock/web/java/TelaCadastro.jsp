
<%@page import="java.sql.SQLException"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta charset="ISO-8859-1">
        <title>JSP Page</title>
    </head>
    <body><%
        // 1) Receber os dados vindos do formulário
        
        int id, qtd;
        String nome, descricao;
        double valor;
        id = Integer.parseInt(request.getParameter("id"));
        nome = request.getParameter("nome");
        descricao = request.getParameter("descricao");
        valor = Double.parseDouble(request.getParameter("valor"));
        qtd = Integer.parseInt(request.getParameter("qtd"));
        
        try {
        // 2) Conectar com o banco de dados
        
        Class.forName("com.mysql.jdbc.Driver");
        Connection conecta = DriverManager.getConnection("jdbc:mysql://localhost:3307/projeto", "root", "01202129");
        
        // 3) Enviar os dados para a tabela do banco de dados
        
        PreparedStatement st = conecta.prepareStatement("INSERT INTO projeto_estoque VALUES (?,?,?,?,?)");
        st.setInt(1, id);
        st.setString(2, nome);
        st.setString(3, descricao);
        st.setDouble(4, valor);
        st.setInt(5, qtd);
        st.executeUpdate();
        out.print("<h1>Material cadastrado com sucesso!</h1><br><button><a href='../index.html'>Cadastrar outros Materiais</a></button>");
        
        // 4) Desconectar do banco de dados
        conecta.close();
            
        } catch(ClassNotFoundException x){
            out.print("Você não colocou o drive JDBC no projeto" + x.getMessage());   
         } catch(SQLException x) {
            out.print("Você digitou alguma coisa de SQL errado" + x.getMessage());
         }
    %>
    </body>
</html>

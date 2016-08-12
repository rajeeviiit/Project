
package javagame;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import javax.swing.JFrame;
import sun.security.util.Debug;

public class JavaGame extends JFrame{
    int x,y;
    public Image img;
    public Graphics grp;
    Font font=new Font("Arial", Font.BOLD |Font.ITALIC,25);

     class AL extends KeyAdapter
    {
        @Override
      public void keyPressed(KeyEvent e){
        int keyCode = e.getKeyCode();
      
        if(keyCode == KeyEvent.VK_LEFT){
           if(x<=7)
               x=7;
            else
            x +=-5;
         
           
        }
        if(keyCode == KeyEvent.VK_RIGHT){
           if(x>=228)
               x=228;
            else
            x +=+5;
         
           
        }
        if(keyCode == KeyEvent.VK_UP){
           if(y<=30) 
            y=30;
           else
            y +=-5;
             
        }
        if(keyCode == KeyEvent.VK_DOWN){
          if(y>=228)
            y=228;
          else
            y +=+5;
           
      }
       
      } 
        @Override
      public void keyReleased(KeyEvent e){
          
      }
        
    }
    
    public JavaGame(){
      
        addKeyListener(new AL());
       
        setTitle("Game");
        setSize(250,250);
        setResizable(true);
        setVisible(true);
        setBackground(Color.CYAN);
       setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        x=150;
        y=150;
        }
    
    public void paint(Graphics g){
    
       img=createImage(getWidth(),getHeight());
       grp=img.getGraphics();
      paintComponent(grp);
       g.drawImage(img, 0, 0,this);
 
    }
    
    
    public void paintComponent(Graphics g){
        g.setFont(font);
        g.setColor(Color.MAGENTA);
        g.drawString("Hello World!", 60, 60);
        g.setColor(Color.red);
        g.fillOval(x, y, 15, 15);
    //g.drawString("points:"+x+y, x,y);
     repaint();
   
    }

    public static void main(String[] args) {
        
        new JavaGame();
        
    }
}

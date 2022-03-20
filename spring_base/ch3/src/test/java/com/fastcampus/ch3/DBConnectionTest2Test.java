package com.fastcampus.ch3;

import junit.framework.TestCase;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.ApplicationContext;
import org.springframework.context.support.GenericXmlApplicationContext;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;

import javax.sql.DataSource;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.Date;

import static org.junit.Assert.*;

@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"file:src/main/webapp/WEB-INF/spring/**/root-context.xml"})
public class DBConnectionTest2Test {
    @Autowired
    DataSource ds;

    @Test
    public void insertUserTest() throws Exception{
        User user = new User("khs1","1234","asdf","aaa@mail.com",new Date(),"fb", new Date());
        deleteAll();
        int rowCount = insertUser(user);

        assertTrue(rowCount==1);
    }

    @Test
    public void selectUserTest() throws Exception {
        deleteAll();
        User user = new User("khs1","1234","asdf","aaa@mail.com",new Date(),"fb", new Date());
        int rowCount = insertUser(user);

        User user2 = selectUser("khs1");

        assertTrue(user2.getId().equals("khs1"));
    }

    @Test
    public void updateUserTest() throws Exception {
        deleteAll();
        User user = new User("khs1","1234","asdf","aaa@mail.com",new Date(),"fb", new Date());
        assertTrue(insertUser(user) == 1);

        User user2 = selectUser(user.getId());
        assertTrue(user2.getId().equals("khs1"));

        assertTrue(updateUser(user.getId()) == 1);
    }

    public int updateUser(String id) throws Exception {
        Connection conn = ds.getConnection();

        String sql = "update user_info set pwd = ? where id = ?";

        PreparedStatement pstmt = conn.prepareStatement(sql);
        pstmt.setString(1,"0000");
        pstmt.setString(2,id);

        return pstmt.executeUpdate();
    }

    @Test
    public void deleteUserTest() throws Exception {
        deleteAll();
        int rowCount = deleteUser("khs1");
        assertTrue(rowCount==0);

        User user = new User("khs1","1234","asdf","aaa@mail.com",new Date(),"fb", new Date());
        rowCount = insertUser(user);
        assertTrue(rowCount == 1);

        rowCount = deleteUser(user.getId());
        assertTrue(rowCount == 1);

        assertTrue(selectUser(user.getId()) == null);
    }

    public int deleteUser(String id) throws Exception {
        Connection conn = ds.getConnection();

        String sql = "delete from user_info where id = ?";

        PreparedStatement pstmt = conn.prepareStatement(sql);
        pstmt.setString(1,id);
        //int rowCount = pstmt.executeUpdate();

        return pstmt.executeUpdate();
    }

    public User selectUser(String id) throws Exception{
        Connection conn = ds.getConnection();

        String sql = "select * from user_info where id = ?";

        PreparedStatement pstmt = conn.prepareStatement(sql);
        pstmt.setString(1,id);
        ResultSet rs = pstmt.executeQuery();  // select

        if (rs.next()) {
            User user = new User();
            user.setId(rs.getString(1));
            user.setPwd(rs.getString(2));
            user.setName(rs.getString(3));
            user.setEmail(rs.getString(4));
            user.setBirth(new Date(rs.getDate(5).getTime()));
            user.setSns(rs.getString(6));
            user.setReg_date(new Date(rs.getDate(7).getTime()));

            return user;
        }

        return null;
    }

    private void deleteAll() throws Exception{
        Connection conn = ds.getConnection();

        String sql = "delete from user_info";

        PreparedStatement pstmt = conn.prepareStatement(sql);
        pstmt.executeUpdate();
    }

    public int insertUser(User user) throws Exception {
        Connection conn = ds.getConnection();

//        insert into user_info (id, pwd, email, birth, sns, reg_date)
//        values ('qaze','1111','kkq@kkw.com','2020-10-10','fb',now());

        String sql = "insert into user_info values (?,?,?,?,?,?,now())";

        PreparedStatement pstmt = conn.prepareStatement(sql);  // sql 공격, 성능향상
        pstmt.setString(1,user.getId());
        pstmt.setString(2,user.getPwd());
        pstmt.setString(3,user.getName());
        pstmt.setString(4,user.getEmail());
        pstmt.setDate(5,new java.sql.Date(user.getBirth().getTime()));
        pstmt.setString(6,user.getSns());

        int rowCount = pstmt.executeUpdate();  // insert, delete, update

        return rowCount;
    }

    @Test
    public void transactionTest() throws Exception{
        Connection conn = null;

        try {
            deleteAll();
            conn = ds.getConnection();
            conn.setAutoCommit(false);

//        insert into user_info (id, pwd, email, birth, sns, reg_date)
//        values ('qaze','1111','kkq@kkw.com','2020-10-10','fb',now());

            String sql = "insert into user_info values (?,?,?,?,?,?,now())";

            PreparedStatement pstmt = conn.prepareStatement(sql);  // sql 공격, 성능향상
            pstmt.setString(1,"qwera");
            pstmt.setString(2,"1234");
            pstmt.setString(3,"kmmd");
            pstmt.setString(4,"asd@mnv.com");
            pstmt.setDate(5,new java.sql.Date(new Date().getTime()));
            pstmt.setString(6,"fb");

            int rowCount = pstmt.executeUpdate();  // insert, delete, update

            pstmt.setString(1,"qwera2");
            rowCount = pstmt.executeUpdate();

            conn.commit();

        } catch (Exception e) {
            conn.rollback();
            e.printStackTrace();
        }
    }

    @Test
    public void springJDBC() throws Exception {
//        ApplicationContext ac = new GenericXmlApplicationContext("file:src/main/webapp/WEB-INF/spring/**/root-context.xml");
//        DataSource ds = ac.getBean(DataSource.class);

        Connection conn = ds.getConnection(); // 데이터베이스의 연결을 얻는다.

        System.out.println("conn = " + conn);

        // 필수
        assertTrue(conn!=null);  // 괄호 안의 조건식이 true면 성공
    }
}

package com.fastcampus.ch3;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.datasource.DataSourceTransactionManager;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;
import org.springframework.transaction.PlatformTransactionManager;
import org.springframework.transaction.TransactionStatus;
import org.springframework.transaction.interceptor.DefaultTransactionAttribute;
import org.springframework.transaction.support.DefaultTransactionDefinition;

import javax.sql.DataSource;

import static org.junit.Assert.*;

@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"file:src/main/webapp/WEB-INF/spring/**/root-context.xml"})

public class A1DoaTest {
    @Autowired
    A1Doa a1Doa;

    @Autowired
    DataSource ds;

    @Autowired
    DataSourceTransactionManager tm;

    @Test
    public void insertTest() throws Exception {
        //PlatformTransactionManager tm = new DataSourceTransactionManager(ds);
        TransactionStatus status = tm.getTransaction(new DefaultTransactionDefinition());
        try {
            a1Doa.delteAll();
            a1Doa.insert(1,100);
            a1Doa.insert(2,200);
            tm.commit(status);
        } catch (Exception e){
            e.printStackTrace();
            tm.rollback(status);
        } finally {

        }

    }
}
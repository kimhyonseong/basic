package com.fastcampus.ch3;

import java.util.Date;
import java.util.Objects;

public class User {
    private String id;
    private String pwd;
    private String name;
    private String email;
    private Date birth;
    private String sns;
    private Date reg_date;

    public User() {
    }

    public User(String id, String pwd, String name, String email, Date birth, String sns, Date reg_date) {
        this.id = id;
        this.pwd = pwd;
        this.name = name;
        this.email = email;
        this.birth = birth;
        this.sns = sns;
        this.reg_date = reg_date;
    }

    public String toString() {
        return "User{id='" + this.id + "', pwd='" + this.pwd + "', name='" + this.name + "', email='" + this.email + "', birth=" + this.birth + ", sns='" + this.sns + "', reg_date=" + this.reg_date + "}";
    }

    public boolean equals(Object o) {
        if (this == o) {
            return true;
        } else if (o != null && this.getClass() == o.getClass()) {
            User user = (User)o;
            return this.id.equals(user.id) && Objects.equals(this.pwd, user.pwd) && Objects.equals(this.name, user.name) && Objects.equals(this.email, user.email) && Objects.equals(this.birth, user.birth) && Objects.equals(this.sns, user.sns);
        } else {
            return false;
        }
    }

    public int hashCode() {
        return Objects.hash(new Object[]{this.id, this.pwd, this.name, this.email, this.birth, this.sns});
    }

    public String getId() {
        return this.id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getPwd() {
        return this.pwd;
    }

    public void setPwd(String pwd) {
        this.pwd = pwd;
    }

    public String getName() {
        return this.name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getEmail() {
        return this.email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public Date getBirth() {
        return this.birth;
    }

    public void setBirth(Date birth) {
        this.birth = birth;
    }

    public String getSns() {
        return this.sns;
    }

    public void setSns(String sns) {
        this.sns = sns;
    }

    public Date getReg_date() {
        return this.reg_date;
    }

    public void setReg_date(Date reg_date) {
        this.reg_date = reg_date;
    }
}

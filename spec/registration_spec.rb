require "json"
require "selenium-webdriver"
require "rspec"
include RSpec::Expectations

describe "vpsFree.cz registration form" do
  BASE_DATA = {
      nick: 'testovac',
      name: 'Testik',
      surname: 'Testovic',
      birth: 1990,
      address: 'Na Ulici',
      city: 'Ve Meste',
      zip: '12345',
      country: 'Ve State',
      email: 'aither@havefun.cz',
  }

  FIELD_TESTS = {
      # field => { true => [values that pass], false => [values that do not pass] }
      nick: {
          false => [
              'a',
              'aa',
              ' ' * 3,
              'Илья́',
              '!@#$%',
              '---',
              '...',
              'a' * 64,
          ],
          true => [
              'aaa',
              'aa-bb',
              'aa.bb',
              'aaa12',
              '1234',
              'a' * 63,
          ],
      },
      name: {
          false => [
              'a',
              'aa',
              ' ' * 3,
          ],
          true => [
              'aaa',
              'Илья́',
              'Алекса́ндрович',
              '立显荣朝士',
          ],
      },
      surname: {
          false => [
              'a',
              'aa',
              ' ' * 3,
          ],
          true => [
              'aaa',
              'Ежо́в',
              '文方运际祥',
          ],
      },
      birth: {
          false => [
              ' ' * 3,
              'abcd',
              '12',
              '123',
              '1900',
              '2016',
          ],
          true => [
              '1999',
          ],
      },
      city: {
          false => [
              ' ' * 3,
              '123 456',
              'a',
              'Aš',
          ],
          true => [
              'Cheb',
              'Valašské Meziříčí',
              '東京',
          ],
      },
      zip: {
          false => [
              ' ' * 5,
              'abcd',
              '12',
              '1234',
              '123456',
          ],
          true => [
              '12345',
              '123 45',
          ],
      },
      email: {
          false => [
              'aa',
              'aaa',
              '  @   .  ',
              '@tld.cz',
              '   @tld.cz',
              'test@@tld.cz',
              'test @tld.cz',
              'test @ tld.cz',
              'test@tld..cz',
              'test..dva@tld.cz',
          ],
          true => [
              'test@tld.cz',
              'test.dva@tld.cz',
              'test.dva.tri@tld.cz',
              'test+dva@tld.cz',
              'test!dva@tld.cz',
              'test.dva@tld-dash.cz',
              'test22@tld.cz',
              'test.22@tld.cz',
              '22test@tld.cz',
          ],
      },
  }

  before(:all) do
    @driver = Selenium::WebDriver.for(:firefox)
    @driver.manage.timeouts.implicit_wait = 5
    @base_url = "https://vpsfree.cz/"
    #@base_url = "http://192.168.122.10/vpsf-gh/"
  end

  after(:all) do
    @driver.quit
  end

  before(:each) do
    enter
  end

  def enter
    @driver.get(@base_url)
    @driver.find_element(:css, 'a[title="Přihláška"]').click

    # Wait for the animated scroll
    sleep(2)

    # Show application form 
    @driver.find_element(:css, '#order button.js-show-form').click
    sleep(0.5)
  end

  def write_fields(fields)
    fields.each do |k, v|
      @driver.find_element(:id, k.to_s).send_keys(v)
    end
  end

  # Submit the form
  def submit
    @driver.find_element(:id, "send").click
    sleep(2)
  end

  def reset
    enter
  end

  def mock
    @driver.execute_script(<<END
        $('form').append(
          '<input type="hidden" id="_mock" name="_mock" value="1">'
        );
END
    )
  end

  def expect_ok
    #expect do
    #  @driver.find_element(:id, f)
    #end.to raise_error(Selenium::WebDriver::Error::NoSuchElementError)

    expect(
        @driver.find_element(:css, 'section.pg.page4 > div.in h2').text
    ).to eq('DĚKUJEME - ODESLÁNO')
  end

  def get_classes(field)
    @driver.find_element(:id, field.to_s).attribute('class').split(/\s+/)
  end
  
  it 'has required fields' do
    submit

    %i(name surname nick birth address city zip country email).each do |v|
      expect(get_classes(v)).to include('error')
    end

    %i(how note).each do |v|
      expect(get_classes(v)).not_to include('error')
    end
  end

  FIELD_TESTS.each do |f, tests|
    tests.each do |pass, values|
      values.each do |v|
        data = BASE_DATA.clone

        it "#{pass ? 'accepts' : 'rejects'} #{f} = '#{v}'" do
          data[f] = v
          write_fields(data)
          mock
          submit

          if pass      
            expect_ok

          else
            expect(get_classes(f)).to include('error')
          end
        end
      end
    end
  end

  it 'validates distribution'
  it 'validates location'
  it 'validates currency'
  
  it 'can be submitted' do
    write_fields(BASE_DATA)
    submit

    expect_ok
  end
end
